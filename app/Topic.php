<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $table = "topic";

    public function comment(){
    	return $this->hasMany('App\Comment','idtopic','id');
    }
    public function customer(){
    	return $this->hasOne('App\Customer','id','username');
    }
}
