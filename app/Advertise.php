<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    //
    protected $table = "advertise";

    public function customer(){
    	return $this->belongsTo('App\Customer','id','username');
    }
}
