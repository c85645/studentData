<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academy;

class AcademyController extends Controller
{
    public function index()
    {
      // 年度下拉選單
      $options = \DB::table('academies')->select('year')->distinct()->get()->pluck('year')->toArray();

      $year = request()->input('year');

      if($year == '') {
        $rows = Academy::paginate(15);
      } else {
        $rows = Academy::where('year', '=', $year)->paginate(15);
      }

      return view('admin.academy.index')->with([
        'years' => $options,
        'rows'  => $rows
      ]);
    }

    public function edit($id)
    {
      $academy = Academy::where('id', '=', $id)->get()->first();
      return view('admin.academy.edit')->with([
        'academy' => $academy,
      ]);
    }

}
