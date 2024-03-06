<?php

	use App\Http\Controllers\ProfileController;
	use App\Http\Controllers\OrdersController;
	use App\Http\Controllers\FrontendController;

	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//	Route::get('/test_request', function (Request $request) {
//		dd($request->url());
//		return view('welcome');
//	});

//	Route::get('/', function () {
//	    return view('welcome');
//	});

//	Route::get('/{any}', function (){
//		return
//	})->where('any', '.*');

	//Web рабочий
//	require __DIR__.'/classic.php';

	//Режим обслуживания статичная страница
	require __DIR__.'/maintenance.php';

	//Проверяем настройки git

	/*Route::get('/calc', function () {
		return view('calc');
	})->middleware(['auth', 'verified'])->name('calc');*/




	/*Route::fallback(function (Request $request) {
//		dd($request->url());
//		dd($request->fullUrl());
//		dd($request);
//		dd($request->fullUrl());
//		$fullUrl = $request->fullUrl();
		$response = Http::get('http://localhost:5777');
//		$response = Http::get('http://localhost:5777' . $fullUrl);
		return $response;
		$response = Http::baseUrl('http://localhost:5888')->get($request->fullUrl());

		return $response->body();

	});*/

	//Route::fallback([FrontendController::class, 'index_power']);

