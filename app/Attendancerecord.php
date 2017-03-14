<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendancerecord extends Model
{
    protected $table = 't_attendancerecord';

    function user(){
        return $this->belongsTo('App\User');
    }

    function location(){
        return $this->belongsTo('App\WorkLocation');
    }
}
