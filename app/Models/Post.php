<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\User;

class Post extends Model implements HasMedia
{
    use HasFactory,
	    InteractsWithMedia;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name_post',
		'content',

	];

	//Получить категорию поста
	public function category() {

        
        return $this->belongsTo(Category::class, 'category_id');
    }


    /*
     * Получить пользователей взаимодествовавших с постом
     * */
	public function users_stated()
	{
		return $this->belongsToMany(User::class, 'user_post_states')->as('states')->withPivot('votes')->withTimestamps();
	}
}
