<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Carbon\CarbonInterval;

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
                    $academy->pdf_url = $diffInHours;
                } else {
                    // 不再評分時間內，回傳「未開放評分」
                    $academy->pdf_url = '尚未開放評分！';
                }
            }
            return view('admin.gradeManagement.teacher.index')->with([
                'academies' => $academies,
            ]);
        }
    }

    public function list()
    {
        if (auth()->user()->isManager()) {
            return view('admin.gradeManagement.manager.list');
        } else {
            return view('admin.gradeManagement.teacher.list');
        }
    }
}
