<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\AccessOptions;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;

class AuthApiController extends Controller
{

	//Регистрация
	public function register(Request $request) {
		/*
		email: string;
		name: string;
		password: string;
		*/

//		if ($request->has('for_del')){
//			$user = User::where('email', $request->input('email'))->first();
//			$user->delete();
//			return response()->json(['message'=>'Пользователь удален']);
//		}


		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
			'password' => ['required', Rules\Password::defaults()],
			//'password' => ['required', 'confirmed', Rules\Password::defaults()],
		]);

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'date_register' => Carbon::now(),

			'password' => Hash::make($request->password),
		]);

		//Назначаеем роль обычного пользователя
		$user->assignRole('user');
		event(new Registered($user));

		//		return response()->json(['token' => $user->createToken('api')->plainTextToken, '_s' => 'ok_registrated' ]);
		//return response($user->createToken('api')->plainTextToken,200);
		$token = $user->createToken('api')->plainTextToken;

		return response()->json([
			'user' => $user,
			'token' => $token
		], 201);

	}

	//Регистрация от телеграмма
	public function tg_register( Request $request ) {

		$validated = $request->validate([
			'tg_api_auth_token' => ['bail','required','string'],
		]);

		//Получить ключ API из базы для сравнения
		//$bd_key = '123456';
		$bd_key = AccessOptions::where('name', 'tg_api_auth_token')->first();

		if ($validated['tg_api_auth_token'] != $bd_key->value) {
			return response()->json([
				'mess' => 'Not valid request from bot',
			], 400);

		}

		$validated = $request->validate([
			'id_telegram' => ['required', 'integer', Rule::unique('users', 'id_telegram')],
			'username_tg' => ['string', 'max:255'],
		]);

		$tg_id = (int)$request->id_telegram;

		$user = User::create([
			'id_telegram' => $tg_id,
			'username_tg' =>  $request->username_tg ?? $request->username_tg,
			'name' => 'NewUser_' . Str::random(10),
			'email' => Str::random(10).'@gmail'.Str::random(3).'.com',
			'date_register' => Carbon::now(),

			'password' => Hash::make(Str::random(10)),
		]);

		//Добавляем в тестовую базу пользователя тоже
//		$user2 = DB::connection('pgsql_dev')
		//->insert('insert into users (id_telegram, username_tg, name, email, date_register, password)
		// values (?, ?, ?, ?, ?, ?)'
		//, [$tg_id,
		// $request->username_tg ?? $request->username_tg,
		// 'NewUser_' . Str::random(10),
//		Str::random(10).'@gmail'.Str::random(3).'.com',
//		Carbon::now(),
//		Hash::make(Str::random(10))
		// ]);

		//Назначаеем роль обычного пользователя
		$user->assignRole('user');
		event(new Registered($user));

		return response()->json([
			'message' => 'User registered in portal',
		], 201);

	    //return true;
	}

	//Изменение пароля из телеграмм
	public function tg_change_pass( Request $request){

		$validated = $request->validate([
			'tg_api_auth_token' => ['bail','required','string'],
		]);

		//Получить ключ API из базы для сравнения
		$bd_key = AccessOptions::where('name', 'tg_api_auth_token')->first();

		if ($validated['tg_api_auth_token'] != $bd_key->value) {
			return response()->json([
				'message' => 'Not valid request from bot',
			], 400);
		}

		$validated = $request->validate([
			'id_telegram' => ['required', 'integer'],
			'password' => ['required', Rules\Password::defaults()],
		]);

		// Check email
		$user = User::where('id_telegram', $request->id_telegram)->first();

		if(!$user){
			return response()->json([
				'message' => 'Такой пользователь не зарегистрирован на портале'
			], 401);
		}

		$user->update(['password' => Hash::make($request->password)]);

		//Отзываем другие токены доступа 'api'
//		$user->tokens()->where('id', 'api')->delete();
		$user->tokens()->delete();

		return response()->json([
			'message' => 'Пароль id_telegram пользователя изменен'
		], 200);
	}

	//Авторизация
	public function login(Request $request) {

		/*
		email: string
		password: string
		*/

		$fields = $request->validate([
			'email' => 'required|string',
			'password' => 'required|string',
			'login_type' => 'required|string' //email | tg_id | login
		]);

		if ($fields['login_type'] == 'email') {
			// Check email
			$user = User::where('email', $fields['email'])->first();
		}

		if ($fields['login_type'] == 'tg_id') {
			// Check email
			$user = User::where('id_telegram', $fields['email'])->first();
		}

		if ($fields['login_type'] == 'login') {
			// Check email
			$user = User::where('nickname', $fields['email'])->first();
		}

		// Check password
		if(!$user || !Hash::check($fields['password'], $user->password)) {
			/*return response([
				'message' => 'Bad creds'
			], 401);*/

			return response()->json([
				'message' => 'Логин или пароль не верны'
			], 401);
		}

		$token = $user->createToken('api')->plainTextToken;

		//$cookie = cookie('api', $token, 60 * 24 * 7);
		return response()->json([
			'user' => $user,
			'token' => $token
		], 200);
		//], 200)->withCookie($cookie);

	}

	//Проверка авторизации
	public function check_session(Request $request) {
		/*
		пустой запрос
		*/
//		$value = $request->cookie('name');
//		dd($request->cookie('my_traderscom_session'));
//		dd($request->cookie('GKUFm5ma1VAkEQ5BKKbSTuzZc40GIL1FR5deMjvN'));
//		dd($request->cookie('XSRF-TOKEN'));
		$response = [];
		return response($response, 200);
	}

	//Выход из авторизации
	public function logout(Request $request) {
		//dd($request->cookie('TOKEN'));
		$user = Auth::user();
		// Отзыв всех токенов ...
		$user->tokens()->delete();

		$response = [
			'message' => 'Logged out'
		];
		return response($response, 200);
		//return 'ok_logout_success';

		// Отзыв определенного токена ...
		//$user->tokens()->where('id', $tokenId)->delete();

		//			return response()->json(['success' => true, 'data' => '', '_s' => 'ok_logout_success' ]);
	}


}
