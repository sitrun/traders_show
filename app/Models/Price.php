<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

	protected $fillable = [
		'switch_active',
		'active',
	];



	protected $dates = [
		'discount_findate',
	];

    //Дату окончания тарифа в правильном формате
	public function getDiscountAttribute()
	{
		//Проверить что discount_findate установлена и это дата
		if ($this->discount_findate !== null and $this->discount_percent > 0) {

			return "{$this->discount_percent}% до {$this->discount_findate->timezone('Europe/Moscow')->format('d.m.Y H:i')}";
		}


	}
}
