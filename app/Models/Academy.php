<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    protected $guarded =[];

    protected $fillable = ['year', 'name_id', 'intro', 'pdf_url', 'fill_out_sdate', 'fill_out_edate', 'score_sdate', 'score_edate'];
}
