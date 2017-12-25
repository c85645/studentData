<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['academy_id', 'student_id', 'teacher_id', 'step',
        'no', 'score', 'score_time'];
}
