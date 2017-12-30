<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use App\Models\Academy;
use App\Models\ScoreItem;
use App\Models\Score;
use App\Models\ImportApplicant;

class GradeManageController extends Controller
{
    public function index()
    {
        // 依照管理員與委員給予指定不同的頁面
        if (auth()->user()->isManager()) {
            // 管理員視角
            $options = Academy::orderBy('year', 'desc')->get()->pluck('year')->unique()->toArray();

            $year = request('year');
            $session_year = session('year');
            if ($year != '') {
                session(['year', $year]);
            } else {
                if ($session_year != null) {
                    $year = $session_year;
                } elseif ($session_year == null) {
                    $year = 0;
                }
            }

            // 學制選項
            $academies = DB::table('academy_names')->get();
            $academy_type = session()->get('academy_type');

            return view('admin.gradeManagement.manager.index')->with([
                'years' => $options,
                'option' => $year,
                'academies' => $academies,
                'academy_type' => $academy_type,
            ]);
        } else {
            // 評審委員視角
            $academies = DB::table('academy_teacher')
            ->join('academies', 'academy_teacher.academy_id', 'academies.id')
            ->join('academy_names', 'academies.name_id', 'academy_names.id')
            ->select('academy_names.name', 'academies.*')
            ->where('teacher_id', auth()->user()->id)
            ->get();

            // 設定語系
            CarbonInterval::setLocale('zh_tw');
            // 這裡要判斷，1.時間未到/超過則回傳 未開放評分 2.在評分期間則回傳 還有多少天數與小時
            foreach ($academies as $key => $academy) {
                $score_sdate = Carbon::createFromFormat('Y-m-d', $academy->score_sdate)->startOfDay();
                $score_edate = Carbon::createFromFormat('Y-m-d', $academy->score_edate)->endOfDay();
                $now = Carbon::now();

                // dd($now, $score_sdate, $score_edate);

                if ($now->between($score_sdate, $score_edate)) {
                    // 在評分開放時間內，回傳倒數時間
                    $nowDiffInDays = $now->diffInDays($score_edate);
                    $nowDiffInHours = $now->diffInHours($score_edate);
                    if ($nowDiffInDays == 0 && $nowDiffInHours > 0) {
                        $leftTime = CarbonInterval::days($nowDiffInDays)->hours($nowDiffInHours)->forHumans();
                    } else {
                        $leftTime = CarbonInterval::days($nowDiffInDays)->hours($nowDiffInDays)->forHumans();
                    }
                    // dd($nowDiffInDays, $nowDiffInHours, $leftTime);
                    $academy->leftTime = $leftTime;
                    $academy->status = true;
                } else {
                    // 不再評分時間內，回傳「未開放評分」
                    $academy->leftTime = '尚未開放評分！';
                    $academy->status = false;
                }
            }
            return view('admin.gradeManagement.teacher.index')->with([
                'academies' => $academies,
            ]);
        }
    }

    // 評審委員視角 學生清單
    public function list()
    {
        if (auth()->user()->isManager()) {
            return redirect()->route('gradeManagement.index')->withErrors([
                'errors' => "權限不足",
            ]);;
        } else {
            // 先判斷輸入有沒有值，若有值代表由前台傳，若沒有值代表由後台回前頁
            // 有值時存入session中，沒有值時從session中取出來
            $radio_button = request('radio_button');
            if ($radio_button != null) {
                request()->session()->put('radio_button', $radio_button);
            } else {
                $radio_button = request()->session()->get('radio_button');
                if ($radio_button == null) {
                    return redirect()->route('gradeManagement.index');
                }
            }
            // 這邊以import_applicants為主表，串applicants表找到id
            $academy = Academy::find($radio_button);
            $applicants = ImportApplicant::where('academy_id', $academy->id)->get();

            foreach ($applicants as $key => $applicant) {
                $scores =  Score::where([
                    ['academy_id', $academy->id],
                    ['student_id', $applicant->id],
                    ['teacher_id', auth()->user()->id]
                ])->get();
                $applicant->scores = $scores;
            }

            return view('admin.gradeManagement.teacher.list')->with([
                'academy' => $academy,
                'applicants' => $applicants,
            ]);
        }
    }

    // 評審委員視角 評分頁面
    public function score()
    {
        if (auth()->user()->isManager()) {
            return redirect()->route('gradeManagement.index')->withErrors([
                'errors' => "權限不足",
            ]);;
        } else {
            $rawSql = DB::raw('substring(import_applicants.personal_id,5,9)');
            $applicant = ImportApplicant::leftJoin('applicants', 'applicants.personal_id', '=', $rawSql)
            ->where('import_applicants.id', request('applicant_id'))
            ->select('import_applicants.*', 'applicants.pdf_path')
            ->orderBy('applicants.created_at', 'desc')
            ->first();

            $academy = Academy::find($applicant->academy_id);
            $score_items = ScoreItem::where('academy_id', $applicant->academy_id)->get();

            if ($applicant->pdf_path != null || $applicant->pdf_path != '') {
                $filePath = Storage::url($applicant->pdf_path);
            } else {
                $filePath = null;
            }
            return view('admin.gradeManagement.teacher.score')->with([
                'applicant' => $applicant,
                'academy' => $academy,
                'score_items' => $score_items,
                'filePath' => $filePath,
          ]);
        }
    }

    public function store()
    {
        if (auth()->user()->isManager()) {
            return redirect()->route('gradeManagement.index')->withErrors([
                'errors' => "權限不足",
            ]);;
        } else {
            $applicant = ImportApplicant::where('id', request('applicant_id'))->first();
            $score_list = request('score');

            $query = Score::where([
                ['academy_id', $applicant->academy_id],
                ['student_id', $applicant->id],
                ['teacher_id', auth()->user()->id]
            ]);

            if ($query->exists()) {
                $query->delete();
            }

            foreach ($score_list as $key => $score) {
                $record = new Score;
                $record->academy_id = $applicant->academy_id;
                $record->student_id = $applicant->id;
                $record->teacher_id = auth()->user()->id;
                $record->no = $key + 1;
                $record->score = $score;
                $record->score_time = Carbon::now()->toDateTimeString();
                $record->save();
            }

            return redirect()->route('teacher.list')->with('status', '資料已儲存!');
        }
    }

    // 管理員視角
    public function search()
    {
        if (auth()->user()->isManager()) {
            // 查學制有哪些老師負責，組成下拉選單
            $academy_type = request('academy_type');
            $year = request('year');

             if ($academy_type != null && $year != null) {
                session()->put('academy_type', $academy_type);
                session()->put('year', $year);
            } else {
                $academy_type = session()->get('academy_type');
                $year = session()->get('year');
                if ($academy_type == null || $year == null) {
                    return redirect()->route('gradeManagement.index');
                }
            }

            $academy = Academy::where([
                ['year', $year],
                ['name_id', $academy_type]
            ])->first();

            return view('admin.gradeManagement.manager.search')->with([
                'academy' => $academy,
            ]);
        } else {
            return redirect()->route('gradeManagement.index')->withErrors([
                'errors' => "權限不足",
            ]);;
        }
    }

    public function teacherPersonal()
    {
        if (auth()->user()->isManager()) {
            return view('admin.gradeManagement.manager.personal');
        } else {
            return redirect()->route('gradeManagement.index')->withErrors([
                'errors' => "權限不足",
            ]);;
        }
    }

    public function result()
    {
        if (auth()->user()->isManager()) {
            return view('admin.gradeManagement.manager.result1');
        } else {
            return redirect()->route('gradeManagement.index')->withErrors([
                'errors' => "權限不足",
            ]);;
        }
    }
}
