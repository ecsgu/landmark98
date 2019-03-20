<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'Customer';

    public function advertise(){
    	return $this->hasMany('App\Advertise','username','id');
    }
}
