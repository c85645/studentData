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


            $applicants = Applicant::where('academy_id', $academy->id)->paginate(10);
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

    /**
     * 後台上傳申請人資料
     */
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

    /**
     * 儲存
     */
    public function store()
    {
        $applicant = new Applicant;
        $applicant->academy_id = request('academy_id');
        $applicant->name = request('name');
        $applicant->personal_id = request('personal_id');
        $applicant->mobile = request('mobile');
        $applicant->email = request('email');
        $applicant->pdf_path = Storage::putFile('public', request()->file('file'));
        $applicant->transfer_grade = request('transfer_grade');
        $applicant->upload_time = Carbon::now()->toDateTimeString();
        $applicant->save();

        return redirect()->route('applicant.search');
    }

    /**
     * 編輯
     */
    public function edit($id)
    {
        $applicant = Applicant::find($id);
        $academy = Academy::find($applicant->academy_id);
        return view('admin.applicant.edit')->with([
            'applicant' => $applicant,
            'academy' => $academy,
        ]);
    }

    /**
     * 更新
     */
    public function update($id)
    {
        $applicant = Applicant::find($id);
        $applicant->name = request('name');
        $applicant->personal_id = request('personal_id');
        $applicant->mobile = request('mobile');
        $applicant->email = request('email');
        if (request('file') != null && request('file') != '') {
            $applicant->pdf_path = Storage::putFile('public', request()->file('file'));
        }
        $applicant->transfer_grade = request('transfer_grade');
        $applicant->upload_time = Carbon::now()->toDateTimeString();
        $applicant->save();

        return redirect()->route('applicant.search');
    }

    /**
     * 刪除
     */
    public function destroy($id)
    {
        Applicant::find($id)->delete();
        return redirect()->route('applicant.search');
    }
}
