<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Transaction extends Model
{
    use HasFactory;

	protected $dates = [
		'payment_date',
		//		'deactivated_at',
		// ...
	];

	//Получить пользователя транзакци
	public function user( ){


//		return $this->hasOne(User::class, 'user_id', 'id_telegram');
		return $this->hasOne(User::class, 'id_telegram', 'user_id');
    }

	//Получить параметры тарифа
	public function tariff( ){


		return $this->belongsTo(Price::class, 'price_id', 'id');
    }

	//Получить дату платежа payment_date_view
	public function getPaymentDateViewAttribute()
	{

		return "{$this->payment_date->timezone('Europe/Moscow')->format('d.m.Y H:i')}";
	}

}
