<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Earnings extends Model
{
    protected $fillable = [
    	'partner_id',
    	'sms',
    	'lok',
    	'lipb'
    ];
}
