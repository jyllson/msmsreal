<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $fillable = [
    	'yearmonth',
    	'name'
    ];
}
