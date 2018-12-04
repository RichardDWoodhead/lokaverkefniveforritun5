<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = ['body', 'title',"user_id"];
   	public function path(){
    	return "/project/$this->id";
    }
    protected function user(){
    	return $this->belongsTo("App\User");
    }
    public function id(){
    	return $this->id();
    }
}
