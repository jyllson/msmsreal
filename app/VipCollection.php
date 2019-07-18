<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VipCollection extends Model
{
    protected $fillable = [
    	'month_id',
		'vip_lok_pop_sum',
		'vip_lok_prp_sum',
		'vip_lok_db',
		'vip_lipb_pop_sum',
		'vip_lipb_prp_sum',
		'vip_lipb_baza'
    ];
}
