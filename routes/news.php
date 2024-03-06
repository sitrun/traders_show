<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;


	//Показать страницу категорий
/*	Route::get('/post-category/{category_name}', function ($category_name = null){
		return view('posts.category');
	})->name('post_category');*/

	Route::get('/post-category/{category:slug}', [CategoryController::class, 'show'])
	     ->name('post_category')
	     ->missing(function (Request $request) {
			return Redirect::route('locations.index');
		})
	;


	//Показать страницу статьи
	/*Route::get('/post-category/{category_name}/post/{post_id?}', function ($category_name, $post_id = null){
		return view('posts.post');
	})->name('post');*/

	Route::get('/_test_frontend/blog/{post_id}', [PostController::class, 'show'])->name('post');

	//Показать создание статьи
	Route::get('/post/create', [PostController::class, 'create'])->name('create-post');

	//Показать редактирование статьи
	Route::put('/post/store', [PostController::class, 'store'])->name('store-post');
	//Использование ресурсной маршрутизации
//	Route::resource('post.store', [PostController::class, 'store'])->name('store-post');

	Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('edit-post');

//	Route::resource('post', PostController::class)->only([
//		'show', 'create', 'store', 'edit'
//	]);

//	Route::resource('post', PostController::class);

	Route::middleware('auth')->group(function () {



	});
