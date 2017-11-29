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
    public function getRoleId()
    {
        return auth()->user()->roles()->where('user_id', auth()->user()->id)->get()->first()->id;
    }

    // 取得該角色
    public function getRole()
    {
        return auth()->user()->roles()->where('user_id', auth()->user()->id)->get()->first();
    }

    // 判斷是不是最高管理員
    public function isAdministrator()
    {
        if (auth()->user()->getRoleId() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function canDo($things_to_do)
    {
        if ($things_to_do == 'manage_students') {
            return true;
        } else {
            return false;
        }
    }

    // 查權限列表
    public function hasPermissions()
    {
        $permission = \DB::table('role_permission')->where('role_id', auth()->user()->getRoleId())->get();
        // dd($permission->pluck('menu_id')->toArray());
        return $permission->pluck('menu_id')->toArray();
    }

    public function getMenus()
    {
        return Menu::getMenus();
    }
}
