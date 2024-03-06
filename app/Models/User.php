<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\My4pResetPass;
use App\Notifications\My4pVerifyMail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',

        'id_telegram',
        'username_tg',

        'family',
        'second_name',
        'nickname',
        'sex',
        'country',
        'city',
        'tel',
        'country',

        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google_id',
        'google_token',
        'google_refresh_token',
        'not_news',
        'not_signals',
        'not_orders',
        'count_update_dep',
        'id_telegram',
        'def_save_order',
        'type_trade',
        'deposit',
        'date_register',
        'currency',
        'balance',
        'created_at',
        'updated_at',
        'email_verified_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
//        'created_at' => 'datetime:d.m.Y H:i',
//        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

	protected $appends = ['user_register'];

    //Аксессор family для преобразования поля
	public function getFamilyAttribute($value)
	{
		return ucfirst($value);
	}

	//Аксессор second_name для преобразования поля
	public function getSecondNameAttribute($value)
	{
		return ucfirst($value);
	}

	public function sendEmailVerificationNotification(){
		$this->notify(new My4pVerifyMail());
	}

	public function sendPasswordResetNotification($token)
	{
		$this->notify(new My4pResetPass($token));
	}


	/**
	 * Получить посты связанные с действиями этого пользователя
	 */
	public function post_states()
	{
		return $this->belongsToMany(Post::class, 'user_post_states')->withPivot('votes')->withTimestamps();
//		return $this->belongsToMany(Post::class, 'user_post_states')->as('states')->withTimestamps()->withPivot('votes');
	}

//	public function getCreatedAtAttribute($value)
//	{
//		$this->attributes['created_at'] = $value;
//		$this->attributes['created_at'] = strtolower($value);
//	}


	//Получить дату регистрации пользователя из поля created_at - преобразовав
	public function getUserRegisterAttribute()
	{

		return "{$this->created_at->timezone('Europe/Moscow')->format('d.m.Y H:i')}";
	}

	//Получить подписки пользователей
	public function subscribes( ){


		return $this->hasMany(Subscribe::class, 'tg_user_id', 'id_telegram');
	}
}
