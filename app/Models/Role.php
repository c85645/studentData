<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'role_id', 'role_name', 'created_name', 'updated_name',
    ];

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Menu', 'role_permission');
    }

    // 查權限列表
    public function hasPermissions(Role $role)
    {
        return $role->permissions()->where('role_id', $role->id)->get();
    }
}
