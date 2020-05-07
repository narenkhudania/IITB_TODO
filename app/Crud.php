<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    	 use SoftDeletes;

   protected $fillable = [
        'post_name','urgency',
    ];
}
