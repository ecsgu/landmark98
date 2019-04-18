<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forgotpw extends Model
{
    //
    protected $table = "forgotpw";

    public function account(){
    	return $this->hasOne('App\Account','username','username');
    }
}
