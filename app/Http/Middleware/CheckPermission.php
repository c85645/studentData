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
        //  依照各功能去查詢帳號是否有所屬權限
        //  user/role >>> 判斷角色是否為administrator
        //  academy/academyPermission/studentData >>> 判斷角色是否有權限
        if($request->is('admin/user') || $request->is('admin/role')) {
            $roles_id = \DB::table('users')
                        ->join('role_user', 'users.id', '=', 'role_user.user_id')
                        ->join('roles', 'roles.id', '=', 'role_user.role_id')
                        ->where('users.id', '=', $request->user()->id);

            if($roles_id->exists()) {
                if($roles_id->get()->first()->role_id != 'administrator'){
                    return redirect('admin');
                }
            } else {
                return redirect('admin');
            }
        } elseif ($request->is('admin/academy') || $request->is('admin/academyPermission') || $request->is('admin/studentData')) {
            $menus = \DB::table('users')
                    ->select('menus.id as id')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->join('role_permission', 'role_user.role_id', '=', 'role_permission.role_id')
                    ->join('menus', 'role_permission.menu_id', '=', 'menus.id')
                    ->where('users.id', '=', $request->user()->id);

            if($menus->exists()) {
                $menus = $menus->get()->pluck('id')->toArray();
                if($request->is('admin/academy')) {
                    if(!in_array(2, $menus)) {
                        return redirect('admin');
                    }
                } elseif ($request->is('admin/academyPermission')) {
                    if(!in_array(3, $menus)) {
                        return redirect('admin');
                    }
                } elseif ($request->is('admin/studentData')) {
                    if(!in_array(1, $menus)) {
                        return redirect('admin');
                    }
                }
            } else {
                return redirect('admin');
            }
        } else {
            return $next($request);
        }
        return $next($request);
    }
}
