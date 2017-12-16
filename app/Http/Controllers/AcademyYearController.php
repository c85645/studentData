<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademyYear;
use DB;

class AcademyYearController extends Controller
{
    public function index()
    {
        $rows = DB::table('academies')->select('year')->distinct()->get()->toArray();

        $now = AcademyYear::get()->first();
        return view('admin.academyYear.index')->with([
            'rows' => $rows,
            'now' => $now,
        ]);
    }

    public function update()
    {
        $thisYear = request()->input('thisYear');
        $now = AcademyYear::get()->first();
        $now->year = $thisYear;
        $now->save();

        return redirect()->to('studentData/admin/academy');
    }
}
