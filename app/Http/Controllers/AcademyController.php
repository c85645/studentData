<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academy;

class AcademyController extends Controller
{
    public function index()
    {
      // 年度下拉選單
      $years = \DB::table('academies')->select('year')->distinct()->get()->pluck('year')->toArray();

      // TODO 預設查詢全部
      return view('admin.academy.index')->with([
        'years' => $years
      ]);
    }

    // ajax查詢年份
    // public function ajaxQueryYears()
    // {
    //   $years = \DB::table('academies')->select('year')->distinct()->get();
    //   return $years;
    // }


}
