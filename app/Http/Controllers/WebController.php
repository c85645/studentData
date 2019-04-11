<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademyYear;
use App\Models\Academy;
use App\Models\AcademyName;
use App\Models\Applicant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class WebController extends Controller
{
    public function index()
    {
        // 查詢系統學年
        $sysYear = AcademyYear::first()->year;
        // 帶出該學年的學制url與判斷是否開放填寫
        $academyList = Academy::where('year', $sysYear)->get();

        foreach ($academyList as $academy) {
            switch ($academy->name_id) {
                case 'A':
                    $academyA = $academy;
                    break;
                case 'B':
                    $academyB = $academy;
                    break;
                case 'G':
                    $academyG = $academy;
                    break;
                case 'H':
                    $academyH = $academy;
                    break;
                case 'I':
                    $academyI = $academy;
                    break;
                case 'J':
                    $academyJ = $academy;
                    break;
                case 'K':
                    $academyK = $academy;
                    break;
            }
        }

        return view('web.index')->with([
            'sysYear' => $sysYear,
            'academyA' => $academyA,
            'academyB' => $academyB,
            'academyG' => $academyG,
            'academyH' => $academyH,
            'academyI' => $academyI,
            'academyJ' => $academyJ,
            'academyK' => $academyK,
        ]);
    }

    // 輸入資料頁
    public function toInput()
    {
        $academyYear = AcademyYear::first()->year;
        $academyType = request('academyType');
        $academyName = AcademyName::where('id', $academyType)->get()->first()->name;
        $academy = Academy::where('year', $academyYear)->where('name_id', $academyType)->first();
        // 檢查是否為開放填寫期間，若非填寫期間則導頁
        $now = Carbon::now();

        $fill_out_sdate = Carbon::createFromFormat('Y-m-d', $academy->fill_out_sdate);
        $fill_out_edate = Carbon::createFromFormat('Y-m-d', $academy->fill_out_edate)->addDay(1);
        if (!$now->between($fill_out_sdate, $fill_out_edate)) {
            return redirect('studentData')->withErrors([
                'errors' => '尚未開放填寫！',
            ]);
        }

        return view('web.input')->with([
            'academyYear' => $academyYear,
            'academyType' => $academyType,
            'academyName' => $academyName,
            'academy' => $academy,
        ]);
    }

    // 儲存資料
    public function save()
    {
        $this -> validate(request(), [
            'name' => 'required|min:2|max:10',
            'personal_id' => 'required|max:6',
            'mobile' => 'required|max:10',
            'email' => 'required|email|max:30',
            'file' => 'required|file'
        ]);

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

        return view('web.success');
    }

    public function redirectToIndex()
    {
        return redirect('studentData');
    }
}
