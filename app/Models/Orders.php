<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

	protected $fillable = [
		'buy_on',
		'credit',
		'dep',
		'open',
		'paire',
		'risk',
		'risk_money',
		'stop',
		'userid',

	];

	protected $hidden = [
		'userid',

	];


}
