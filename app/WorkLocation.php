<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkLocation extends Model
{
    protected $table = 'm_work_location';

    public function attendancerecord(){
        return $this->hasMany('App\Attendancerecord','location_id');
    }
}
