<?php

	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use App\Http\Controllers\ProfileController;
	use App\Http\Controllers\OrdersController;
	use App\Http\Controllers\FrontendController;
	use App\Http\Controllers\TgBotAdminController;

	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Http;

	Route::redirect('/', '/public_calc');

	Route::get('/maintenance', function () {
		return view('home_ maintenance');
	})->name('home');

//	Route::get('/calc', [OrdersController::class, 'index'])->middleware(['auth', 'verified'])->name('calc');
//
	Route::get('/public_calc', function () {
		return view('home_ maintenance');
	});

//	Route::get('/bot_admin', function () {
//		return view('bot_admin');
//	})->name('home');


//	Route::get('/bot_admin_auth', function () {
//
//		return view('bot_admin_auth');
//	})->name('auth_bot');

//	Route::get('/bot_admin', function (Request $request) {
//		$auth_token = $request->cookie('auth_ok');
//		if ($auth_token == '$2y$10$AzadNOJWhScpfdljgJHm0u4jVXQL6BYokusqkSxpw6.6ysBYlGRSu'){
//			return view('bot_admin');
//		};
//		return view('bot_admin_auth');
//
//	})->name('home_bot_admin');

	Route::get('/bot_admin', [TgBotAdminController::class, 'main_page'])->name('home_bot_admin');

	//Виды меню
//	Route::get('/bot_admin/list_users', function (Request $request) {
//		return view('tgbot.direct_templates.list_users');
//	});
//	Route::get('/bot_admin/list_workers', function (Request $request) {
//		return view('tgbot.direct_templates.list_workers');
//	});
//	Route::get('/bot_admin/payments', function (Request $request) {
//		return view('tgbot.direct_templates.payments');
//	});

	Route::prefix('/bot_admin')->group(function () {

		Route::get('/tariffs', [TgBotAdminController::class, 'tariffs_view'])->name('tariffs_view');
		Route::get('/list_users', [TgBotAdminController::class, 'list_users_view'])->name('list_users_view');
		Route::get('/list_workers', [TgBotAdminController::class, 'list_workers_view'])->name('list_users_view');
		Route::get('/payments', [TgBotAdminController::class, 'payments_view'])->name('payments_view');
		Route::get('/params', [TgBotAdminController::class, 'params_view'])->name('params_view');


		Route::get('/aside_posts', function (Request $request) {
			return view('tgbot.direct_templates.aside_posts');
		});

		Route::get('/test', [TgBotAdminController::class, 'test_view'])->name('test_view');

	});


	//Авторизация
	Route::post('/check_admin_bot_auth', function (Request $request){

		$login = $request->email;
		$pass = $request->password;
		$minutes = 60*24*1;

		if ($login == 'superadmin' and $pass == 'h@llotrader$') {
			return response()->json(['success' => true, 'data' => 'Good luck!', '_s' => 'ok_check_auth',
			                         '_text' => 'Вы вошли! Добро пожаловать в Админку!'])
			                 ->withCookie('auth_ok', '$2y$10$AzadNOJWhScpfdljgJHm0u4jVXQL6BYokusqkSxpw6.6ysBYlGRSu', $minutes);
		}

		return response()->json(['success' => false, 'data' => 'fuck off', '_s' => 'no_auth',
		                         '_text' => 'Не правильный логин или пароль']);


		$response = new Response('Hello, MouseDC!');
		$minutes = 60*24*7;
		$response->withCookie('auth_ok', '$2y$10$AzadNOJWhScpfdljgJHm0u4jVXQL6BYokusqkSxpw6.6ysBYlGRSu', $minutes);
		$value = $request->cookie('auth_ok');
//		return $response;

		$cookie = cookie('key', 'value', $minutes);

		return response('Hello, MouseDC!')->cookie($cookie);
//		return "Проверка авторизации auth_ok -".$value."-";

	})->name('check_auth');
	Route::get('/admin_bot_logout', function (Request $request){
		$response = new Response('Вышли из админки');
//		$response->withCookie('auth_ok', '');
		return Redirect::route('home_bot_admin')->withCookie('auth_ok', '');
	});

	//Ajax запросы
	Route::post('/bot_main_menu_admin', [TgBotAdminController::class, 'main_menu'])->name('aj_bot_main_menu_admin');
	Route::post('/bot_actions', [TgBotAdminController::class, 'bot_actions'])->name('aj_bot_actions');


