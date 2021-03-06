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
        $options = Academy::orderBy('year', 'desc')->get()->pluck('year')->unique()->toArray();

        $query = Academy::join('academy_names', 'academies.name_id', '=', 'academy_names.id')
        ->select('academies.*', 'academy_names.name');

        $year = request('year');
        $session_year = session('year');
        if ($year != null && $year != '') {
            session(['year' => $year]);
        } else {
            if ($session_year != null) {
                $year = $session_year;
            } else {
                $year = 0;
            }
        }

        // return array
        $teacherPermission = auth()->user()->getAcademyPermission($year);

        $rows = $query->where('year', $year)
        ->whereIn('academies.name_id', $teacherPermission)
        ->paginate(10);

        return view('admin.academy.index')->with([
            'years' => $options,
            'rows'  => $rows,
            'option'  => $year,
        ]);
    }

    public function edit($id)
    {
        $academy = Academy::where('academies.id', $id)->first();

        /**
         * 判斷使用者權限
         * 若為「最高管理員」則可以修改「管理員」與「評審委員」權限
         * 若為「管理員」則只能修改「評審委員」權限
         */
        $queryTeachers = User::where('users.status', true);
        $teachers;
        if (auth()->user()->isAdministrator() == true) {
            // 最高管理員
            $teachers = $queryTeachers->whereHas('roles', function ($query) {
                $query->whereIn('id', [2, 3]);
            })->get();
        } else {
            // 管理員
            $teachers = $queryTeachers->whereHas('roles', function ($query) {
                $query->whereIn('id', [3]);
            })->get();
        }

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
        $teacherArray;
        if (request('owners')) {
            $teacherArray = request('owners');
            array_push($teacherArray, (string)(auth()->user()->id));
        } else {
            $teacherArray = array((string)(auth()->user()->id));
        }

        // 更新負責的老師
        $academy->teachers()->sync($teacherArray);

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
