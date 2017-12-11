<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AcademyPermissionController extends Controller
{
    public function index()
    {
        // 下拉選項
        $options = \DB::table('academies')->select('year')->distinct()->get()->pluck('year')->toArray();

        $year = request()->input('year');

        if ($year == '') {
            $year = 999;
            $users = User::where('id', '=', 0)->get();
        } else {
            $users = User::get();
        }
        return view('admin.academyPermission.index')->with([
          'options' =>  $options,
          'users'   =>  $users,
          'year'    =>  $year,
        ]);
    }
}
