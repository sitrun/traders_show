<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    protected $quarded = []; //разрешать заполнять все поля

	//Вывести категории детей потомки
	public function children(){


		return $this->hasMany(self::class, 'parent_id');
	}

	//Вывести все посты данной категории
	public function posts(){


	    return $this->hasMany(Post::class,'category_id');
	}
}
