<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use App\Models\Academy;
use App\Models\ScoreItem;

class GradeManageController extends Controller
{
    public function index()
    {
        // 依照管理員與委員給予指定不同的頁面
        if (auth()->user()->isManager()) {
            // 管理員視角

            return view('admin.gradeManagement.manager.index');
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

                if ($now->between($score_sdate, $score_edate)) {
                    // 在評分開放時間內，回傳倒數時間
                    $nowDiffInDays = $now->diffInDays($score_edate);
                    $nowDiffInHours = $now->diffInDays($score_edate);
                    $diffInHours = CarbonInterval::days($nowDiffInDays)->hours($nowDiffInHours)->forHumans();
                    $academy->leftTime = $diffInHours;
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
            return view('admin.gradeManagement.manager.list');
        } else {
            // 先判斷輸入有沒有值，若有值代表由前台傳，若沒有值代表由後台回前頁
            // 有值時存入session中，沒有值時從session中取出來
            if (request('radioButton') == null) {
                $radioButton = request()->session()->get('radioButton');
            } else {
                $radioButton = request('radioButton');
                request()->session()->put('radioButton', $radioButton);
            }
            // 這邊以import_applicants為主表，串applicants表找到id
            $academy = Academy::find($radioButton);
            $applicants = DB::table('import_applicants')
            ->where('is_Pass', true)
            ->get();

            return view('admin.gradeManagement.teacher.list')->with([
                'academy' => $academy,
                'applicants' => $applicants,
            ]);
        }
    }

    // 評審委員視角 評分
    public function score()
    {
        $applicant = DB::table('import_applicants')
        ->where('id', request('applicant_id'))
        ->first();

        $academy = Academy::find($applicant->academy_id);
        $score_items = ScoreItem::where('academy_id', $applicant->academy_id)->get();

        // For Test
        $filePath = Storage::url('public/oxYjnPfT60eVh4qleLkF0KZZhb87PPvFDJPmF6UU.pdf');
        return view('admin.gradeManagement.teacher.score')->with([
            'applicant' => $applicant,
            'academy' => $academy,
            'score_items' => $score_items,
            'filePath' => $filePath,
        ]);
    }

    public function store()
    {
        // dd(request('score'));
        // $score = request('score');

        return redirect()->route('applicant.list')->with('status', '資料已儲存!');
    }
}
