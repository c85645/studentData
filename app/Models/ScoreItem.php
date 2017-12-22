<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreItem extends Model
{
    protected $guarded = [];

    protected $table = 'score_item_data';

    // 評分項目屬於學制（多對一）
    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }
}
