<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    protected $guarded =[];

    protected $fillable = ['year', 'name_id', 'intro', 'pdf_url', 'fill_out_sdate',
       'fill_out_edate', 'score_sdate', 'score_edate'];

    public function getAcademyName()
    {
        $name = \DB::table('academies')
                    ->join('academy_names', 'academies.name_id', '=', 'academy_names.id')
                    ->where('academies.name_id', $this->name_id)
                    ->get()
                    ->pluck('name')
                    ->first();
        return $name;
    }
}
