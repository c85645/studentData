<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academy;
use App\Models\User;

class AcademyController extends Controller
{
    public function index()
    {
        // 年度下拉選單
        $options = Academy::orderBy('year', 'desc')
        ->get()
        ->pluck('year')
        ->unique()
        ->toArray();

        $query = Academy::join('academy_names', 'academies.name_id', '=', 'academy_names.id')
        ->select('academies.*', 'academy_names.name');

        $year = request()->input('year');

        if ($year == '') {
            $year = 0;
        }

        $rows = $query->where('year', $year)->paginate(9);

        return view('admin.academy.index')->with([
            'years' => $options,
            'rows'  => $rows,
            'option'  => $year,
        ]);
    }

    public function edit($id)
    {
        $academy = Academy::where('academies.id', $id)->first();

        $teachers = User::where('users.status', true)
        ->whereHas('roles', function ($query) {
            $query->whereIn('id', [2, 3]);
        })->get();

        $available_teachers = $academy->teachers->pluck('id')->toArray();

        return view('admin.academy.edit')->with([
            'academy' => $academy,
            'teachers' => $teachers,
            'available_teachers' => $available_teachers,
        ]);
    }

    public function update($id)
    {
        $academy = Academy::find($id);
        // 填寫內容更新至學制
        $academy->update(request()->only(['fill_out_sdate', 'fill_out_edate',
            'score_sdate', 'score_edate', 'pdf_url']));
        // 更新負責的老師
        $academy->teachers()->sync(request()->input('owners'));

        // 處理評分項目
        $data = request()->all();
        $nameList = array_get($data, 'dataList.name');
        $percentList = array_get($data, 'dataList.percent');
        $records = array_map(function ($name, $percent) {
            return compact('name', 'percent');
        }, $nameList, $percentList);

        // 刪除後新增
        $academy->scoreItems()->delete();
        foreach ($records as $key => $record) {
            $academy->scoreItems()->create(array_merge($record, ['no' => $key + 1]));
        }

        return redirect()->to('studentData/admin/academy');
    }
}
