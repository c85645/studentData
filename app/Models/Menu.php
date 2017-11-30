<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'parent_id', 'title', 'url', 'icon', 'order',
    ];

    public static function getMenus()
    {
        return Menu::get();
    }
}
