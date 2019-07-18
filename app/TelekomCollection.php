<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelekomCollection extends Model
{
    protected $fillable = [
    	'month_id',
    	'lok_billed_postpaid',
    	'lok_collected_m4',
		'lok_collected_m3',
		'lok_collected_m2',
		'lok_collected_m1',
		'lok_db',
		'lipb_billed_postpaid',
		'lipb_collected_m4',
		'lipb_collected_m3',
		'lipb_collected_m2',
		'lipb_collected_m1',
		'lipb_db'
    ];
}
