<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_attendancerecord extends Model
{
    protected $table = 't_attendancerecord';

    function t_user(){
        return $this->belongsTo('App\t_user');
    }

    function m_work_location(){
        return $this->belongsTo('App\m_work_location');
    }
}
