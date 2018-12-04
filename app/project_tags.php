<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project_tags extends Model
{
    protected $fillable = ["project_id","tag_id"];
}
