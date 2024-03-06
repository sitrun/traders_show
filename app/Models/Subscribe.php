<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Price;

class Subscribe extends Model
{
    use HasFactory;

	protected $dates = [
		'finish_dt',
	];

	//Получить дату подписки из поля finish_dt - преобразовав finish_date_show
	public function getFinishDateShowAttribute()
	{
		if (!$this->finish_dt) {
		    return '';
		}
		
		return "{$this->finish_dt->timezone('Europe/Moscow')->format('d.m.Y H:i')}";
	}

	//Получить тариф подписки
	public function tariff() {

//		$tariff = $this->belongsTo(Price::class, 'prices_id', 'id');
//		if (!$tariff) {
//		    return '';
//		}

		return $this->belongsTo(Price::class, 'prices_id', 'id');
//		return $tariff;
//		return $this->hasOne(Price::class, 'id', 'prices_id');
	}

}
