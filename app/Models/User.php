<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\Menu;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account', 'name', 'password', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    // 查該角色代碼
    public function getRoleId(User $user)
    {
        $role = $user->roles()->where('user_id', $user->id);
        $isNull = $role->exists();
        if ($isNull == true) {
            return $role->get()->first()->id;
        } else {
            return 0;
        }
    }

    // 查該帳號自己的角色代碼
    public function getOwnRoleId()
    {
        $role = auth()->user()->roles()->where('user_id', auth()->user()->id);
        $isNull = $role->exists();
        if ($isNull == true) {
            return $role->get()->first()->id;
        } else {
            return 0;
        }
    }

    // 取得該角色
    public function getRole()
    {

        return auth()->user()->roles()->where('user_id', auth()->user()->id)->get()->first();
    }

    // 判斷是不是最高管理員
    public function isAdministrator()
    {
        if (auth()->user()->getOwnRoleId() == 1) {
            return true;
        } else {
            return false;
        }
    }

    // 查權限列表
    public function hasPermissions()
    {
        $permission = \DB::table('role_permission')->where('role_id', auth()->user()->getOwnRoleId())->get();
        // dd($permission->pluck('menu_id')->toArray());
        return $permission->pluck('menu_id')->toArray();
    }

    // 取得清單
    public function getMenus()
    {
        return Menu::getMenus();
    }
}
