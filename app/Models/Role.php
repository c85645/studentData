<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role_id', 'role_name', 'created_name', 'updated_name'];

    // 關聯模型（權限）
    public function permissions()
    {
        return $this->belongsToMany(Menu::class, 'role_permission');
    }

    // 關聯模型（使用者）
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // 查權限列表
    public function hasPermissions()
    {
        return $this->permissions()->where('role_id', $this->id)->get();
    }
}
