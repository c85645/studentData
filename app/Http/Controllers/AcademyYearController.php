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
            $temp = Academy::where('year', $inputYear)
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
                $maxYear = Academy::max('year');
                $records = Academy::where('year', $maxYear)->get();
                foreach ($records as $record) {
                    // 新增學制
                    $newRecord = new Academy();
                    $newRecord->year = $inputYear;
                    $newRecord->name_id = $record->name_id;
                    $newRecord->pdf_url = $record->pdf_url;
                    $newRecord->fill_out_sdate = $record->fill_out_sdate;
                    $newRecord->fill_out_edate = $record->fill_out_edate;
                    $newRecord->score_sdate = $record->score_sdate;
                    $newRecord->score_edate = $record->score_edate;
                    $newRecord->save();

                    // 取出原學制id 查評分項目 再寫新物件
                    $originItems = DB::table('score_item_data')
                                        ->where('academy_id', $record->id);
                    if ($originItems->exists()) {
                        $tempQuery = DB::table('score_item_data')
                                    ->where('academy_id', $newRecord->id);
                        if ($tempQuery->exists()) {
                            // Delete 若有資料則先刪除
                            $tempQuery->delete();
                        }

                        $itemList = array();
                        foreach ($originItems->get() as $item) {
                            array_push($itemList, [
                                'academy_id'  =>  $newRecord->id,
                                'no'    =>  $item->no,
                                'name'  =>  $item->name,
                                'percent' =>  $item->percent,
                            ]);
                        }

                        // Insert
                        foreach ($itemList as $record) {
                            DB::table('score_item_data')->insert($record);
                        }
                    }
                }
            }
        } elseif ($action == 'delete') {
            // 直接刪除 academies 的該學年資料（但不刪除評分項目）
            $academyYear = AcademyYear::where('year', $inputYear)->exists();
            if($academyYear) {
                return back()->withInput()->withErrors([
                    'errors' => '無法刪除當前年度！',
                ]);
            } else {
                Academy::where('year', $inputYear)->delete();
            }
        }
        return redirect()->to('studentData/admin/academyYear');
    }
}
