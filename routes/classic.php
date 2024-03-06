<?php


	use App\Http\Controllers\ProfileController;
	use App\Http\Controllers\OrdersController;
	use App\Http\Controllers\FrontendController;

	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Http;

	//Web рабочий
	Route::redirect('/', '/public_calc');

//	Route::get('/public_calc', function () {
//		return view('test_app');
//	})->name('test_app');

	Route::get('/public_calc', function () {
		return view('home');
	})->name('home');

	Route::get('/signals', function () {
		return view('signals');
	})->name('signals');

	Route::get('/statistic', function () {
		return view('statistic');
	})->name('statistic');


	//Web рабочий
	Route::get('/calc', [OrdersController::class, 'index'])->middleware(['auth', 'verified'])->name('calc');
	Route::post('/calc/save_order', [OrdersController::class, 'store'])->middleware(['auth', 'verified'])->name('save_order');
	Route::get('/calc/delete_order/{id}', [OrdersController::class, 'destroy'])->middleware(['auth', 'verified'])->name('delete_order');
	Route::get('/calc/update_order/loss/{id}', [OrdersController::class, 'update'])->middleware(['auth', 'verified'])->name('update_order_loss');
	Route::get('/calc/update_order/profit/{id}', [OrdersController::class, 'update'])->middleware(['auth', 'verified'])->name('update_order_profit');

	//Web рабочий
	Route::get('/any_link', function () {
		return view('any_link');
	})->name('any_link');

	Route::get('/dashboard', function () {
		return view('dashboard');
	})->middleware(['auth', 'verified'])->name('dashboard');

	Route::middleware('auth')->group(function () {
		Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

		Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
		Route::post('/profile', [ProfileController::class, 'updateOnes'])->name('profile.update_ones');
		Route::post('/profile_email', [ProfileController::class, 'updateOnesEmail'])->name('profile.update_ones_email');

		Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

		//Бетта версия личного кабинета
		Route::get('/profile_beta', [ProfileController::class, 'edit_beta'])->name('profile_beta.edit');
		Route::post('/profile_beta', [ProfileController::class, 'update_beta'])->name('profile_beta.store');

	});

	require __DIR__.'/auth.php';
	require __DIR__.'/news.php';
	require __DIR__.'/formal.php';