<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tgbot_text extends Model
{
    use HasFactory;

	protected $fillable = [
		'message',

    ];
}
