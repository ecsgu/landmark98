<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'Customer';
    public $incrementing =false;
    public function advertise(){
    	return $this->hasMany('App\Advertise','username','id');
    }
    public function account(){
        return $this->hasOne('App\Account','username','id');
    }
}
