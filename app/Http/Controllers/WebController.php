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
        $sysYear = AcademyYear::get()->first()->year;
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
                case 'C':
                  $academyC = $academy;
                break;
                case 'D':
                  $academyD = $academy;
                break;
                case 'E':
                  $academyE = $academy;
                break;
                case 'F':
                  $academyF = $academy;
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
            }
        }

        return view('web.index')->with([
            'sysYear' => $sysYear,
            'academyA' => $academyA,
            'academyB' => $academyB,
            'academyC' => $academyC,
            'academyD' => $academyD,
            'academyE' => $academyE,
            'academyF' => $academyF,
            'academyG' => $academyG,
            'academyH' => $academyH,
            'academyI' => $academyI,
        ]);
    }

    // 輸入資料頁
    public function toInput()
    {
        $academyYear = AcademyYear::get()->first()->year;
        $academyType = request()->input('academyType');
        $academyName = AcademyName::where('id', $academyType)
                                    ->get()
                                    ->first()
                                    ->name;
        $academy = Academy::where('year', $academyYear)
                            ->where('name_id', $academyType)
                            ->get()
                            ->first();
        // 檢查是否為開放填寫期間，若非填寫期間則導頁
        // dd(Carbon::now());
        $now = Carbon::now();
        if (!$now->between(Carbon::createFromFormat('Y-m-d', $academy->fill_out_sdate),
                  Carbon::createFromFormat('Y-m-d', $academy->fill_out_edate))) {
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
        $path = Storage::putFile('pdfs', request()->file('file'));
        $applicant = new Applicant;
        $applicant->academy_id = request()->input('academy_id');
        $applicant->name = request()->input('name');
        $applicant->personal_id = request()->input('personal_id');
        $applicant->mobile = request()->input('mobile');
        $applicant->email = request()->input('email');
        $applicant->pdf_path = $path;
        $applicant->transfer_grade = request()->input('transfer_grade');
        $applicant->upload_time = Carbon::now()->toDateTimeString();
        $applicant->save();

        return redirect('studentData');
    }

    public function redirectToIndex()
    {
        return redirect('studentData');
    }
}
