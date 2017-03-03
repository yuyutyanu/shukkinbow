<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_work_location extends Model
{
    protected $table = 'm_work_location';

    public function t_attendancerecord(){
        return $this->hasMany('App\t_attendancerecord','location_id');
    }
}
