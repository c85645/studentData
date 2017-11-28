<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;

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

    public function getRoleId(User $user)
    {
        $role_id = $user->roles()->where('user_id', $user->id)->get()->first()->id;
        return $role_id;
    }

    public function canDo($things_to_do)
    {
        if ($things_to_do == 'manage_students') {
            return true;
        } else {
            return false;
        }
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
