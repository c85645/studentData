<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\ImportApplicant;
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
        $options = Academy::orderBy('year', 'desc')->get()->pluck('year')->unique()->toArray();

        $year = request('year');
        $session_year = session('year');
        if ($year != '') {
            session(['year' => $year]);
        } else {
            if ($session_year != null) {
                $year = $session_year;
            } elseif ($session_year == null) {
                $year = 0;
            }
        }

        // 學制選項
        $academies = DB::table('academy_names')->get();

        $academy_type = session()->get('academy_type');
        $data_type = session()->get('data_type');

        return view('admin.applicant.index')->with([
            'years' => $options,
            'option' => $year,
            'academies' => $academies,
            'academy_type' => $academy_type,
            'data_type' => $data_type,
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

        $academy = Academy::where([
            ['year', $year],
            ['name_id', $academy_type]
        ])->first();

        $keyword = request('keyword');

        // 依照要查的資料種類做不同的select
        if ($data_type == 1) {
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
            if ($keyword == '') {
                $import_applicants = ImportApplicant::where('academy_id', $academy->id)->paginate(10);
            } else {
                $import_applicants = ImportApplicant::where([
                    ['name', 'like', '%'.$keyword.'%'],
                    ['academy_id', $academy->id],
                ])->paginate(10);
            }

            return view('admin.applicant.importData.index')->with([
                'academy' => $academy,
                'import_applicants' => $import_applicants,
                'keyword' => $keyword,
            ]);
        } elseif ($data_type == 3) {
            $results = collect([]);
            $import_applicants = ImportApplicant::where('academy_id', $academy->id)->get();

            foreach ($import_applicants as $import_applicant) {
                // 擷取匯入人的身分證後六碼
                $substr_id = substr($import_applicant->personal_id, 4, 9);
                $rawSql = DB::raw('substring(import_applicants.personal_id,5,9)');

                // 用身分證後六碼去找前台是否有資料
                $applicant_query = Applicant::where([
                    ['personal_id', $substr_id],
                    ['academy_id', $academy->id],
                ])->orderBy('created_at', 'desc');

                // 若有資料則由匯入資料為主串前台資料
                if ($applicant_query->exists()) {
                    if ($keyword != '') {
                        $list = ImportApplicant::join('applicants', 'applicants.personal_id', '=', $rawSql)
                        ->where([
                            ['import_applicants.academy_id', $academy->id],
                            ['import_applicants.personal_id', $import_applicant->personal_id],
                            ['import_applicants.name', 'like', '%'.$keyword.'%'],
                        ])
                        ->select('import_applicants.*', 'applicants.pdf_path')
                        ->orderBy('applicants.created_at', 'desc')
                        ->first();
                    } else {
                        $list = ImportApplicant::join('applicants', 'applicants.personal_id', '=', $rawSql)
                        ->where([
                            ['import_applicants.academy_id', $academy->id],
                            ['import_applicants.personal_id', $import_applicant->personal_id]
                        ])
                        ->select('import_applicants.*', 'applicants.pdf_path')
                        ->orderBy('applicants.created_at', 'desc')
                        ->first();
                    }

                    if ($list != null) {
                        $results->push($list);
                    }
                }
            }

            return view('admin.applicant.signUpFinish.index')->with([
                'academy' => $academy,
                'results' => $results,
                'keyword' => $keyword,
            ]);
        } elseif ($data_type == 4) {
            $results = array();
            $web_applicants = Applicant::where('academy_id', $academy->id)->get();
            $import_applicants = ImportApplicant::where('academy_id', $academy->id)->get();

            // 先以前台資料為主查詢後台有無資料，若無，加入狀態並加入reuslts內
            foreach ($web_applicants as $web_applicant) {
                $rawSql = DB::raw('substring(import_applicants.personal_id,5,9)');
                $imports = ImportApplicant::where([
                    ['academy_id', $academy->id],
                    [$rawSql, $web_applicant->personal_id]
                ]);

                if (!$imports->exists()) {
                    array_push($results, [
                        'name' => $web_applicant->name,
                        'personal_id' => $web_applicant->personal_id,
                        'mobile' => $web_applicant->mobile,
                        'email' => $web_applicant->email,
                        'status' => '查無後台匯入資料',
                    ]);
                }
            }

            // 以後台資料為主查詢前台有無資料，若無，加入狀態並加入results內
            foreach ($import_applicants as $import_applicant) {
                // 擷取匯入人的身分證後六碼
                $substr_id = substr($import_applicant->personal_id, 4, 9);
                $rawSql = DB::raw('substring(import_applicants.personal_id,5,9)');

                // 用身分證後六碼去找前台是否有資料
                $applicant_query = Applicant::where([
                    ['personal_id', $substr_id],
                    ['academy_id', $academy->id],
                ])->orderBy('created_at', 'desc');

                // 若有資料則由匯入資料為主串前台資料
                if (!$applicant_query->exists()) {
                    // 若查不到資料則列入清單
                    array_push($results, [
                        'name' => $import_applicant->name,
                        'personal_id' => $import_applicant->personal_id,
                        'mobile' => $import_applicant->mobile,
                        'email' => $import_applicant->email,
                        'status' => '查無前台填寫資料',
                    ]);
                }
            }

            // dd($results);

            return view('admin.applicant.signUpUnFinish.index')->with([
                'academy' => $academy,
                'results' => $results,
                // 'keyword' => $keyword,
            ]);
        } else {
            return redirect()->route('gradeManagement.index');
        }
    }
}
