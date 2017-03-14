<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 't_user';

    public function attendancerecord(){
        return $this->hasMany('App\Attendancerecord','user_id','id');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

}
