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

        if ($year == '') {
            $rows = Academy::join('academy_names', 'academies.name_id', '=', 'academy_names.id')
                  ->select('academies.*', 'academy_names.name')
                  ->paginate(15);
        } else {
            $rows = Academy::join('academy_names', 'academies.name_id', '=', 'academy_names.id')
                  ->select('academies.*', 'academy_names.name')
                  ->where('year', '=', $year)->paginate(15);
        }

        return view('admin.academy.index')->with([
          'years' => $options,
          'rows'  => $rows
        ]);
    }

    public function edit($id)
    {
        $academy = Academy::join('academy_names', 'academies.name_id', '=', 'academy_names.id')
                   ->select('academies.*', 'academy_names.name')
                   ->where('academies.id', '=', $id)->get()->first();
        $score_items = \DB::table('score_item_data')
                        ->where('code', '=', $academy->id)
                        ->get();
        return view('admin.academy.edit')->with([
          'academy' => $academy,
          'score_items' => $score_items,
        ]);
    }

    public function update($id)
    {
        $academy = Academy::find($id);
        // 判斷若為碩專、碩士甄試則為2 (待確認需不需要)
        // $step = 1;
        // if($academy->name_id == 'H' || $academy->name_id == 'I') {
        //     $step = 2;
        // }

        $data = request()->all();
        $nameList = array_get($data, 'dataList.name');
        $percentList = array_get($data, 'dataList.percent');
        $fill_out_sdate = request()->input('fill_out_sdate');
        $fill_out_edate = request()->input('fill_out_edate');
        $score_sdate = request()->input('score_sdate');
        $score_edate = request()->input('score_edate');

        // dd($nameList[0],$percentList[0]);

        $dataList = array();
        if ($nameList != null) {
            for ($i = 0; $i < count($nameList); $i++) {
                if ($nameList[$i] == null || $percentList[$i] == null) {
                    break;
                } else {
                    array_push($dataList, [
                        'year'  =>  $academy->year,
                        'code'  =>  $academy->id,
                        'no'    =>  ($i + 1),
                        'name'  =>  $nameList[$i],
                        'percent' =>  $percentList[$i],
                    ]);
                }
            }
        }

        // dd($dataList);

        $temp = \DB::table('score_item_data')
                    ->where([
                      ['year', '=', $academy->year],
                      ['code', '=', $academy->id],
                    ])->exists();
        if ($temp == true) {
          // Delete & Insert
            \DB::table('score_item_data')
                      ->where([
                        ['year', '=', $academy->year],
                        ['code', '=', $academy->id],
                      ])->delete();
            foreach ($dataList as $record) {
                \DB::table('score_item_data')->insert($record);
            }
        } else {
            // Insert
            foreach ($dataList as $record) {
                \DB::table('score_item_data')->insert($record);
            }
        }

        \DB::table('academies')
              ->where('id', $id)
              ->update([
                  'fill_out_sdate'  =>  $fill_out_sdate,
                  'fill_out_edate'  =>  $fill_out_edate,
                  'score_sdate'  =>  $score_sdate,
                  'score_edate'  =>  $score_edate,
              ]);

        return redirect()->to('admin/academy');
    }
}
