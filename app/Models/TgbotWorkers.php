<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TgbotWorkers extends Model
{
    use HasFactory;

	protected $fillable = [
		'role',
	];

	//Вывести название роли role_name
	public function getRoleNameAttribute()
	{
		//Проверить что discount_findate установлена и это дата
		switch ($this->role){
		    case 1:
				return 'Гл.админ';
		    break;
		    case 2:
			    return 'Редактор';
		    break;
		    case 3:
			    return 'Тех.поддержка';
		    break;

		}


	}
}
