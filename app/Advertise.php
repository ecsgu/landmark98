<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    //
    protected $table = "Advertise";

    public function customer(){
    	return $this->belongsTo('App\Customer','id','username');
    }
}
