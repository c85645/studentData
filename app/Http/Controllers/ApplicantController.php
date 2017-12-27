<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Academy;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;

class ApplicantController extends Controller
{
    /**
     * 申請人資料管理
     */
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

    /**
     * 搜尋
     */
    public function search()
    {
        $data_type = request('data_type');
        $academy_type = request('academy_type');
        $year = request('year');

        if ($data_type != null && $academy_type != null && $year != null) {
            session()->put('data_type', $data_type);
            session()->put('academy_type', $academy_type);
            session()->put('year', $year);
        } else {
            $data_type = session()->get('data_type');
            $academy_type = session()->get('academy_type');
            $year = session()->get('year');
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

            $keyword = request('keyword');
            if ($keyword == '') {
                $applicants = Applicant::where('academy_id', $academy->id)->paginate(10);
            } else {
                $applicants = Applicant::where([
                    ['name', 'like', '%'.$keyword.'%'],
                    ['academy_id', $academy->id],
                ])->paginate(10);
            }

            return view('admin.applicant.frontData.index')->with([
                'academy' => $academy,
                'applicants' => $applicants,
                'keyword' => $keyword,
            ]);
        } elseif ($data_type == 2) {
            return view('admin.applicant.importData');
        } elseif ($data_type == 3) {
            return view('admin.applicant.signUpSuccess');
        } else {
            return redirect()->route('gradeManagement.index');
        }
    }
}
