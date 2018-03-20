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
use App\Models\User;

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
                session(['year' => $year]);
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

            // 設定顯示時間語系
            CarbonInterval::setLocale('zh_TW');
            // 這裡要判斷，1.時間未到/超過則回傳 未開放評分 2.在評分期間則回傳 還有多少天數與小時
            foreach ($academies as $academy) {
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
            ]);
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

            foreach ($applicants as $applicant) {
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

    public function store()
    {
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

    // 管理員視角
    public function search()
    {
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
        session(['academy_id' => $academy->id]);

        return view('admin.gradeManagement.manager.search')->with([
            'academy' => $academy,
        ]);
    }

    /**
     * 先判斷是看 1.老師個人評分 2.總成績 來決定導頁
     * 再判斷是否為碩專/碩甄
     */
    public function result()
    {
        // 若session中有存學制id，則取出查學制
        if (session()->has('academy_id')) {
            $academy_id = session('academy_id');
        }
        $academy = Academy::find($academy_id);

        // 判斷session內是否有存值
        $teacher_id = request('teacher_id');
        if ($teacher_id != null) {
            session(['teacher_id' => $teacher_id]);
        } else {
            $teacher_id = session('teacher_id');
            if ($teacher_id == null) {
                return redirect()->route('manager.search');
            }
        }

        // 判斷查詢個別委員評分or總成績
        if ($teacher_id != 'total') {
            // 評委個別成績
            $teacher = User::where([
                ['status', true],
                ['id', $teacher_id]
            ])->first();
            $score_items = ScoreItem::where('academy_id', $academy->id)->get();
            $applicants = ImportApplicant::where('academy_id', $academy->id)->get();

            foreach ($applicants as $applicant) {
                $query = Score::where([
                    ['academy_id', $academy->id],
                    ['student_id', $applicant->id],
                    ['teacher_id', $teacher->id],
                    ['step', 1]
                ]);
                $applicant->scores = $query->get();
                $applicant->sum = $query->sum('score');
                $applicant->score_time = $query->select('score_time')->pluck('score_time')->first();
            }

            return view('admin.gradeManagement.manager.personal.result')->with([
                'academy' => $academy,
                'teacher' => $teacher,
                'applicants' => $applicants,
                'score_items' => $score_items,
            ]);
        } else {
            // 總成績
            if ($academy->name_id == 'H' || $academy->name_id == 'I') {
                $applicants = ImportApplicant::where('academy_id', $academy->id)->get();
                // 複製申請人清單給第二個表格使用
                $applicants2 = $applicants;
                $score_items = ScoreItem::where('academy_id', $academy->id)->get();

                $raw_sql = DB::raw('avg(score) as average');
                // 第一階段成績
                foreach ($applicants as $applicant) {
                    $query_avg = Score::where([
                        ['academy_id', $academy->id],
                        ['student_id', $applicant->id],
                        ['step', 1]
                    ])->select($raw_sql)->groupBy('no');
                    $query_sum = DB::table(DB::raw("({$query_avg->toSql()}) as sub"))
                    ->mergeBindings($query_avg->getQuery())
                    ->sum('average');
                    $applicant->avg = $query_avg->get();
                    $applicant->sum = $query_sum;
                }

                // 第二階段成績
                foreach ($applicants2 as $record) {
                    $step2_score = Score::where([
                        ['academy_id', $academy->id],
                        ['student_id', $record->id],
                        ['step', 2]
                    ])->pluck('score')->first();
                    $record->step2_score = $step2_score;
                }

                return view('admin.gradeManagement.manager.total.result2')->with([
                    'academy' => $academy,
                    'applicants' => $applicants,
                    'applicants2' => $applicants2,
                    'score_items' => $score_items,
                ]);
            } else {
                // 一階
                $applicants = ImportApplicant::where('academy_id', $academy->id)->get();
                $score_items = ScoreItem::where('academy_id', $academy->id)->get();

                $raw_sql = DB::raw('avg(score) as average');
                foreach ($applicants as $applicant) {
                    $query_avg = Score::where([
                        ['academy_id', $academy->id],
                        ['student_id', $applicant->id],
                    ])->select($raw_sql)->groupBy('no');

                    $query_sum = DB::table(DB::raw("({$query_avg->toSql()}) as sub"))
                    ->mergeBindings($query_avg->getQuery())
                    ->sum('average');

                    $applicant->avg = $query_avg->get();
                    $applicant->sum = $query_sum;
                }

                return view('admin.gradeManagement.manager.total.result1')->with([
                    'academy' => $academy,
                    'applicants' => $applicants,
                    'score_items' => $score_items,
                ]);
            }
        }
    }

    /**
     * 輸入第二階段面試分數
     * @return [type] [description]
     */
    public function edit()
    {
        // 若session中有存學制id，則取出查學制
        if (session()->has('academy_id')) {
            $academy_id = session('academy_id');
        }
        $academy = Academy::find($academy_id);
        $applicants = ImportApplicant::where('academy_id', $academy->id)->get();

        foreach ($applicants as $record) {
            $scores = Score::where([
                'academy_id' => $academy->id,
                'student_id' => $record->id,
                'step' => 2,
            ])->pluck('score')->first();
            $record->score = $scores;
        }

        return view('admin.gradeManagement.manager.edit')->with([
            'academy' => $academy,
            'applicants' => $applicants,
        ]);
    }

    /**
     * 儲存第二階段面試分數
     * @return [type] [description]
     */
    public function storeScores()
    {
        // 若session中有存學制id，則取出查學制
        if (session()->has('academy_id')) {
            $academy_id = session('academy_id');
        }
        $academy = Academy::find($academy_id);

        $data = request()->all();
        $id_list = array_get($data, 'dataList.student_id');
        $score_list = array_get($data, 'dataList.score');
        $records = array_map(function ($student_id, $score) {
            return compact('student_id', 'score');
        }, $id_list, $score_list);

        $array_list = array();
        foreach ($records as $record) {
            array_push($array_list, [
                'academy_id' => $academy->id,
                'student_id' => $record['student_id'],
                'score' => $record['score'],
                'step' => 2,
                'score_time' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        foreach ($array_list as $record) {
            $query = Score::where([
                'academy_id' => $academy->id,
                'student_id' => $record['student_id'],
                'step' => 2,
            ]);
            if ($query->exists()) {
                $query->delete();
            }

            DB::table('scores')->insert($record);
        }

        return redirect()->route('manager.result')->with('status', '資料已儲存!');
    }

    public function editIsPass($id)
    {
        // 若session中有存學制id，則取出查學制
        if (session()->has('academy_id')) {
            $academy_id = session('academy_id');
        }
        $academy = Academy::find($academy_id);
        $applicant = ImportApplicant::where([
            ['academy_id', $academy->id],
            ['id', $id],
        ])->first();

        return view('admin.gradeManagement.manager.editIsPass')->with([
            'academy' => $academy,
            'applicant' => $applicant,
        ]);
    }

    public function storeIsPass($id)
    {
        $is_pass = request('is_pass');
        $applicant = ImportApplicant::find($id);
        $applicant->update([
            'is_pass' => $is_pass,
        ]);

        return redirect()->route('manager.result')->with('status', '資料已儲存!');
    }
}
