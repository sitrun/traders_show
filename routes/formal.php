<?php

	use Illuminate\Support\Facades\Route;

	Route::get('/privacy', function () {
		return view('formal.privacy');
	})->name('privacy');

	Route::get('/terms', function () {
		return view('formal.terms');
	})->name('terms');