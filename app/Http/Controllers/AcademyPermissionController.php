<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Academy;
use App\Models\AcademyName;

class AcademyPermissionController extends Controller
{
    public function index()
    {
        // 下拉選項
        $options = \DB::table('academies')->select('year')->distinct()->get()->pluck('year')->toArray();

        $year = request('year');
        $session_year = session('year');
        if ($year != null && $year != '') {
            session(['year' => $year]);
        } else {
            if ($session_year != null) {
                $year = $session_year;
            } elseif ($session_year == null) {
                $year = 0;
            }
        }

        $academy_names = AcademyName::get();

        if ($year == null || $year == '') {
            $year = 999;
            $users = User::where('id', 0)->get();
        } else {
            $users = User::get();
        }
        return view('admin.academyPermission.index')->with([
            'options' =>  $options,
            'users'   =>  $users,
            'year'    =>  $year,
            'academy_names' => $academy_names,
        ]);
    }

    public function edit()
    {
        $year = request('year');
        $user_id = request('user_id');

        $user = User::find($user_id);
        $academy_permissions = \DB::table('academy_teacher')
        ->where('teacher_id', $user_id)->get()->pluck('academy_id')->toArray();
        $academies = Academy::where('year', $year)->get();

        return view('admin.academyPermission.edit')->with([
            'user' => $user,
            'academy_permissions' => $academy_permissions,
            'academies' => $academies,
            'year' => $year,
        ]);
    }

    public function update()
    {
        $year = request('year');
        $user_id = request('user_id');
        $permissions = request('permissions');

        \DB::table('academy_teacher')->where('teacher_id', $user_id)->delete();
        if ($permissions != null) {
            $permissionsList = array();
            for ($i = 0; $i < count($permissions); $i++) {
                array_push($permissionsList, [
                    'academy_id' => $permissions[$i],
                    'teacher_id' => $user_id,
                ]);
            }

            foreach ($permissionsList as $record) {
                \DB::table('academy_teacher')->insert($record);
            }
        }

        return redirect()->to('studentData/admin/academyPermission');
    }
}
