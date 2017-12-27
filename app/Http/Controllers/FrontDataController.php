<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Academy;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;

class FrontDataController extends Controller
{
     /**
     * 後台上傳申請人資料
     */
    public function create()
    {
        $academy_type = request('academy_type');
        $year = request('year');

        if ($academy_type != null && $year != null) {
            session()->put('academy_type', $academy_type);
            session()->put('year', $year);
        } else {
            $academy_type = session()->get('academy_type');
            $year = session()->get('year');
            if ($academy_type == null || $year == null) {
                return redirect()->route('gradeManagement.index');
            }
        }

        $academy = Academy::where([
            ['year', $year],
            ['name_id', $academy_type]
        ])->first();

        return view('admin.applicant.frontData.create')->with([
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

        return view('admin.applicant.frontData.edit')->with([
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
