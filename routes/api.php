<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\CategoryApiController;
use App\Models\User;

use App\Http\Controllers\OrdersController;
use App\Models\Orders;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

	/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
		//Здесь все защищеные пути для авторизованных пользователей
	    return $request->user();
	});*/

	/*Route::get('auth/logout', function(Request $request) {
		return 'ok_logout_success';
		return response()->json(['success' => true, 'data' => '', '_s' => 'ok_logout_success' ]);
	});*/

	//Public
	Route::post('auth/registration', [AuthApiController::class, 'register']);
	Route::post('auth/tg_register', [AuthApiController::class, 'tg_register']);
	Route::post('auth/tg_change_pass', [AuthApiController::class, 'tg_change_pass']);
	Route::post('auth/login', [AuthApiController::class, 'login'])->name('api_login');


	Route::post('auth/delusers', function(Request $request){

		$user_id = $request->user_id;
		$access_key = $request->access_key;
		
		if ($access_key != '$2y$10$WcWB2oYmSm7.GEDFsDGPBO6TVZ7.jGfX2q3EYmIANAKRh68qz5zVu66') {
		    return 'Ключи не совпадают, доступ запрещен!!';
		}

		if (User::find($user_id)) {
			User::find($user_id)->delete();
			echo "\n user_id for del:" .$user_id;
		}

		return "\n\nOk_del_custom";
		$user_list = [2, 3, 10, 418,
						423,
						428,
						429,
						430,
						431,
						432,
						433,
						434,
						435,
						436];
//		$user_list = [$user_id];
		$buf = $user_list;
//		foreach ( $buf as $k => $user_id ) {
//			Удаляем пока по валид листу
//			echo "\n user_id for del:" . $user_id;
//			User::find($user_id)->delete();
//		}

		$start = 1;
		$fin = 436;
		for($i = $start; $i < $fin+1 ; $i++ ){
			if (!in_array($i, $user_list)) {
				if (User::find($i)) {
					User::find($i)->delete();
					echo "\n user_id for del:" . $i;
				}else{
					echo "\n Пользователя НЕ СУЩЕСТВУЕТ user_id [" . $i . "]";
				}


			}else{
				echo "\n этот пользователь не будет удален id=[".$i."]";
			}



		}



		return "\n" . 'Hello user id['.$user_id.'] deleted ^-^ ' ;
	});

	// Protected routes
	Route::middleware('auth:sanctum')->group(function () {

		Route::post('auth/logout', [AuthApiController::class, 'logout']);
		Route::get('auth/session', [AuthApiController::class, 'check_session']);


		// TODO-fin: Защитить маршрут редактора
		//Создать пост
		Route::post('/post/store', [PostController::class, 'store'])->name('store-post');

		//Обновление поста
		Route::put('/post/{post}', [PostController::class, 'update'])->name('update-post');

		//Удаление поста
		Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('destroy-post');

		//Список постов
		Route::get('/posts', [PostController::class, 'index'])->name('all-posts');


		//Работа с ордерами
		Route::prefix('calc')->group(function () {
			//		Route::get('/all', [OrdersController::class, 'index'])->name('user_calc');
			//Сохранить ордер
			Route::post('/save_order', [OrdersController::class, 'store'])->name('save_order');

			Route::put('/update_order/loss/{orders}', [OrdersController::class, 'update'])->name('update_order_loss');
			Route::put('/update_order/profit/{orders}', [OrdersController::class, 'update'])->name('update_order_profit');

			Route::delete('/delete_order/{orders}', [OrdersController::class, 'destroy'])->name('delete_order');

			Route::fallback([OrdersController::class, 'index'])->name('user_calc');

		});

	});




	//Смотреть пост
	Route::get('/post/{post}', [PostController::class, 'show'])->name('show-post');

	//Запрос списка постов через категорию
	Route::get('/post-category/{category:slug}', [CategoryApiController::class, 'show'])->name('show-category-posts');
