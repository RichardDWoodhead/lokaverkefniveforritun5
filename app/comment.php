<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
	protected $fillable = ["body","project_id","user_id"];	
    function user(){
    	return $this->belongsTo("App\user");
    }
}
