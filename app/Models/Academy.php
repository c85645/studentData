<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Academy extends Model
{
    protected $fillable = ['year', 'name_id', 'intro', 'pdf_url', 'fill_out_sdate',
       'fill_out_edate', 'score_sdate', 'score_edate'];

    // 學制是否在開放區間內
    public function isOpen()
    {
        if($this->fill_out_sdate == '' || $this->fill_out_edate == '') {
            return false;
        } else {
            return Carbon::now()
                    ->between(Carbon::createFromFormat('Y-m-d', $this->fill_out_sdate),
                              Carbon::createFromFormat('Y-m-d', $this->fill_out_edate));
        }
    }

    // 學制擁有很多的評分項目（一對多）
    public function scoreItems()
    {
        return $this->hasMany(ScoreItem::class);
    }

    // 學制對應的學制名稱（一對一）
    public function name()
    {
        return $this->belongsTo(AcademyName::class);
    }

    // 老師負責哪些學制
    public function teachers()
    {
        return $this->belongsToMany(User::class, 'academy_teacher', 'academy_id', 'teacher_id');
    }
}
