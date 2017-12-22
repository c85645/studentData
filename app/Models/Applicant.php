<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = ['academy_id', 'name', 'personal_id',
        'mobile', 'email', 'pdf_path', 'transfer_grade', 'upload_time'];
}
