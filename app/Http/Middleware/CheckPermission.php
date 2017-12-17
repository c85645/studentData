<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $returnMsg = "權限不足";
        //  依照各功能去查詢帳號是否有所屬權限
        //  user/role >>> 判斷角色是否為administrator
        //  academy/academyPermission/applicant/gradeManagement >>> 判斷角色是否有權限
        if ($request->is('studentData/admin/user') || $request->is('studentData/admin/role')
              || $request->is('studentData/admin/academyYear')) {
            $roles_id = \DB::table('users')
                        ->join('role_user', 'users.id', '=', 'role_user.user_id')
                        ->join('roles', 'roles.id', '=', 'role_user.role_id')
                        ->where('users.id', '=', $request->user()->id);
            if ($roles_id->exists()) {
                if ($roles_id->get()->first()->role_id != 'administrator') {
                    return redirect('studentData/admin')->withErrors([
                        'errors' => $returnMsg,
                    ]);
                }
            } else {
                return redirect('studentData/admin')->withErrors([
                    'errors' => $returnMsg,
                ]);
            }
        } elseif ($request->is('studentData/admin/academy') || $request->is('studentData/admin/academyPermission')
            || $request->is('studentData/admin/applicant') || $request->is('studentData/admin/gradeManagement')) {
            $menus = \DB::table('users')
                    ->select('menus.id as id')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->join('role_permission', 'role_user.role_id', '=', 'role_permission.role_id')
                    ->join('menus', 'role_permission.menu_id', '=', 'menus.id')
                    ->where('users.id', '=', $request->user()->id);

            if ($menus->exists()) {
                $menus = $menus->get()->pluck('id')->toArray();
                if ($request->is('studentData/admin/academy')) {
                    if (!in_array(2, $menus)) {
                        return redirect('studentData/dmin')->withErrors([
                            'errors' => $returnMsg,
                        ]);
                    }
                } elseif ($request->is('studentData/admin/academyPermission')) {
                    if (!in_array(3, $menus)) {
                        return redirect('studentData/admin')->withErrors([
                            'errors' => $returnMsg,
                        ]);
                    }
                } elseif ($request->is('studentData/admin/applicant')) {
                    if (!in_array(1, $menus)) {
                        return redirect('studentData/admin')->withErrors([
                            'errors' => $returnMsg,
                        ]);
                    }
                } elseif ($request->is('studentData/admin/gradeManagement')) {
                    if (!in_array(4, $menus)) {
                        return redirect('studentData/admin')->withErrors([
                            'errors' => $returnMsg,
                        ]);
                    }
                }
            } else {
                return redirect('studentData/dmin')->withErrors([
                    'errors' => $returnMsg,
                ]);
            }
        } else {
            return $next($request);
        }
        return $next($request);
    }
}
