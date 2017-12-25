<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Academy;
use DB;

class ApplicantController extends Controller
{
    public function index()
    {
        // 年度下拉選單
        $options = Academy::orderBy('year', 'desc')
        ->get()
        ->pluck('year')
        ->unique()
        ->toArray();

        $year = request()->input('year');
        if ($year == '') {
            $year = 0;
        }

        // 學制選項
        $academies = DB::table('academy_names')->get();

        return view('admin.applicant.index')->with([
            'years' => $options,
            'option' => $year,
            'academies' => $academies,
        ]);
    }

    public function search()
    {
        $data_type = request('data_type');
        $academy_type = request('academy_type');
        $year = request('year');

        if ($data_type != null && $academy_type != null && $year != null) {
            request()->session()->put('data_type', $data_type);
            request()->session()->put('academy_type', $academy_type);
            request()->session()->put('year', $year);
        } else {
            $data_type = request()->session()->get('data_type');
            $academy_type = request()->session()->get('academy_type');
            $year = request()->session()->get('year');
            if ($data_type == null || $academy_type == null || $year == null) {
                return redirect()->route('gradeManagement.index');
            }
        }

        // 依照要查的資料種類做不同的select
        if ($data_type == 1) {
            $academy = Academy::where([
                ['year', $year],
                ['name_id', $academy_type]
            ])->first();


            $applicants = Applicant::where('academy_id', $academy->id)->get();
            // dd($applicants);

            return view('admin.applicant.frontData')->with([
                'academy' => $academy,
                'applicants' => $applicants,
            ]);
        } elseif ($data_type == 2) {
            return view('admin.applicant.importData');
        } elseif ($data_type == 3) {
            return view('admin.applicant.signUpSuccess');
        } else {
            return redirect()->route('gradeManagement.index');
        }
    }

    public function create()
    {
        $academy_type = request('academy_type');
        $year = request('year');

        if ($academy_type != null && $year != null) {
            request()->session()->put('academy_type', $academy_type);
            request()->session()->put('year', $year);
        } else {
            $academy_type = request()->session()->get('academy_type');
            $year = request()->session()->get('year');
            if ($academy_type == null || $year == null) {
                return redirect()->route('gradeManagement.index');
            }
        }

        $academy = Academy::where([
            ['year', $year],
            ['name_id', $academy_type]
        ])->first();
        return view('admin.applicant.create')->with([
            'academy' => $academy,
        ]);
    }

    public function edit()
    {
        return view('admin.applicant.edit');
    }

    public function update()
    {
        return redirect()->route('applicant.search');
    }

    public function delete()
    {
        Applicant::find(request('applicant_id'))->delete();
        return redirect()->route('applicant.search');
    }
}
