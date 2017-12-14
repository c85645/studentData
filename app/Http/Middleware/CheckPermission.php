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
        if ($request->is('admin/user') || $request->is('admin/role')) {
            $roles_id = \DB::table('users')
                        ->join('role_user', 'users.id', '=', 'role_user.user_id')
                        ->join('roles', 'roles.id', '=', 'role_user.role_id')
                        ->where('users.id', '=', $request->user()->id);

            if ($roles_id->exists()) {
                if ($roles_id->get()->first()->role_id != 'administrator') {
                    return redirect('admin')->withErrors([
                        'errors' => $returnMsg,
                    ]);
                }
            } else {
                return redirect('admin')->withErrors([
                    'errors' => $returnMsg,
                ]);
            }
        } elseif ($request->is('admin/academy') || $request->is('admin/academyPermission')
            || $request->is('admin/applicant') || $request->is('admin/gradeManagement')) {
            $menus = \DB::table('users')
                    ->select('menus.id as id')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->join('role_permission', 'role_user.role_id', '=', 'role_permission.role_id')
                    ->join('menus', 'role_permission.menu_id', '=', 'menus.id')
                    ->where('users.id', '=', $request->user()->id);

            if ($menus->exists()) {
                $menus = $menus->get()->pluck('id')->toArray();
                if ($request->is('admin/academy')) {
                    if (!in_array(2, $menus)) {
                        return redirect('admin')->withErrors([
                            'errors' => $returnMsg,
                        ]);
                    }
                } elseif ($request->is('admin/academyPermission')) {
                    if (!in_array(3, $menus)) {
                        return redirect('admin')->withErrors([
                            'errors' => $returnMsg,
                        ]);
                    }
                } elseif ($request->is('admin/applicant')) {
                    if (!in_array(1, $menus)) {
                        return redirect('admin')->withErrors([
                            'errors' => $returnMsg,
                        ]);
                    }
                } elseif ($request->is('admin/gradeManagement')) {
                    if (!in_array(4, $menus)) {
                        return redirect('admin')->withErrors([
                            'errors' => $returnMsg,
                        ]);
                    }
                }
            } else {
                return redirect('admin')->withErrors([
                    'errors' => $returnMsg,
                ]);
            }
        } else {
            return $next($request);
        }
        return $next($request);
    }
}
