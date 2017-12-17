<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademyYear;
use App\Models\Academy;
use DB;

class AcademyYearController extends Controller
{
    public function index()
    {
        $rows = DB::table('academies')
                    ->select('year')
                    ->distinct()
                    ->get()
                    ->toArray();

        $now = AcademyYear::get()->first();
        return view('admin.academyYear.index')->with([
            'rows' => $rows,
            'now' => $now,
        ]);
    }

    public function edit()
    {
        $thisYear = request()->input('thisYear');
        $now = AcademyYear::get()->first();
        $now->year = $thisYear;
        $now->save();

        return redirect()->to('studentData/admin/academy');
    }

    public function update()
    {
        $action = request()->input('action');
        $inputYear = request()->input('inputYear');
        if ($action == 'insert') {
            // 先查詢 academies 存不存在，若存在則回傳錯誤訊息，若不存在則複製最大學年新增（academies ）
            $temp = DB::table('academies')
                      ->where('year', $inputYear)
                      ->select('year')
                      ->distinct()
                      ->exists();
            if ($temp) {
                return back()->withInput()->withErrors([
                    'errors' => '已存在該學年度！',
                ]);
            } else {
                // 1.取出 最大年度 academies 與 score_item_data 資料
                // 2.修改資料中的年度為輸入的新年度並儲存
                return "不存在";
            }
        } elseif ($action == 'delete') {
            // 直接刪除 academies 的該學年資料（但不刪除評分項目）
            Academy::where('year', $inputYear)->delete();
        }
        return redirect()->to('studentData/admin/academyYear');
    }
}
