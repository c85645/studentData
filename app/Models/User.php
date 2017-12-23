<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account', 'name', 'password', 'status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // 查該角色代碼
    public function getRoleId()
    {
        $role = $this->roles()->where('user_id', $this->id);
        if ($role->exists()) {
            return $role->get()->first()->id;
        } else {
            return 0;
        }
    }

    // 查該帳號自己的角色代碼
    public function getOwnRoleId()
    {
        $role = $this->roles()->where('user_id', $this->id);
        if ($role->exists()) {
            return $role->get()->first()->id;
        } else {
            return 0;
        }
    }

    // 判斷是不是最高管理員
    public function isAdministrator()
    {
        if ($this->getOwnRoleId() == 1) {
            return true;
        } else {
            return false;
        }
    }

    // 判斷是否為管理員，否為評審委員
    public function isManager()
    {
        if ($this->getOwnRoleId() == 1 || $this->getOwnRoleId() == 2) {
            return true;
        } else {
            return false;
        }
    }

    // 查權限列表
    public function hasPermissions()
    {
        $permission = \DB::table('role_permission')
                          ->where('role_id', auth()->user()->getOwnRoleId())
                          ->get();
        return $permission->pluck('menu_id')->toArray();
    }

    // 取得清單
    public function getMenus()
    {
        return Menu::get();
    }

    // 取得角色權限(回傳array)
    public function getAcademyPermission($year)
    {
        $academyPermission = \DB::table('academy_teacher')
                                ->join('academies', 'academy_teacher.academy_id', '=', 'academies.id')
                                ->select('academies.name_id')
                                ->where([
                                    ['academy_teacher.teacher_id', '=', $this->id],
                                    ['academies.year', '=', $year]
                                ])
                                ->get()
                                ->pluck('name_id')
                                ->toArray();
        return $academyPermission;
    }

    // 取得角色名稱
    public function getRoleName()
    {
        return  $this->roles()->where('user_id', $this->id)->get()->pluck('role_name')->first();
    }
}
