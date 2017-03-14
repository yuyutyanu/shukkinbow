<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'm_company';

    public function user(){
        return $this->hasMany('App\User','company_id');
    }
}
