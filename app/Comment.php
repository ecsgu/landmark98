<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    //
    protected $table = "Comment";

    public function topic(){
    	return $this->belongsTo('App\Topic','idtopic','id');
    }
}
