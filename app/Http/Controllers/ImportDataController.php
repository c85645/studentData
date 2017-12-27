<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academy;
use App\Models\ImportApplicant;
use Carbon\Carbon;

class ImportDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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

        return view('admin.applicant.importData.create')->with([
            'academy' => $academy,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $applicant = new ImportApplicant;
        $applicant->academy_id = request('academy_id');
        $applicant->exam_number = request('exam_number');
        $applicant->name = request('name');
        $applicant->gender = request('gender');
        $applicant->graduated_school = request('graduated_school');
        $applicant->graduated_department = request('graduated_department');
        $applicant->equivalent_qualifications = request('equivalent_qualifications');
        $applicant->identity = request('identity');
        $applicant->graduated_school_classification = request('graduated_school_classification');
        $applicant->birth = request('birth');
        $applicant->personal_id = request('personal_id');
        $applicant->address = request('address');
        $applicant->mobile = request('mobile');
        $applicant->email = request('email');
        $applicant->is_pass = request('is_pass');
        $applicant->import_time = Carbon::now()->toDateTimeString();
        $applicant->save();

        return redirect()->route('applicant.search');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $applicant = ImportApplicant::find($id);
        $academy = Academy::find($applicant->academy_id);

        return view('admin.applicant.importData.edit')->with([
            'applicant' => $applicant,
            'academy' => $academy,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $applicant = ImportApplicant::find($id);
        $applicant->academy_id = request('academy_id');
        $applicant->exam_number = request('exam_number');
        $applicant->name = request('name');
        $applicant->gender = request('gender');
        $applicant->graduated_school = request('graduated_school');
        $applicant->graduated_department = request('graduated_department');
        $applicant->equivalent_qualifications = request('equivalent_qualifications');
        $applicant->identity = request('identity');
        $applicant->graduated_school_classification = request('graduated_school_classification');
        $applicant->birth = request('birth');
        $applicant->personal_id = request('personal_id');
        $applicant->address = request('address');
        $applicant->mobile = request('mobile');
        $applicant->email = request('email');
        $applicant->is_pass = request('is_pass');
        $applicant->import_time = Carbon::now()->toDateTimeString();
        $applicant->save();

        return redirect()->route('applicant.search');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ImportApplicant::find($id)->delete();

        return redirect()->route('applicant.search');
    }
}
