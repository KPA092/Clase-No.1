<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

Route::group(['prefix' => 'users', 'controller' => UserController::class], function () {
	Route::get('/', 'index');
	Route::get('/{user}', 'show');
	Route::post('/', 'store');
	Route::put('/{user}', 'update');
	Route::delete('/{user}', 'destroy');
});

Route::group(['prefix' => 'authors', 'controller' => AuthorController::class], function () {
	Route::get('/', 'index');
	Route::get('/{author}', 'show');
	Route::post('/', 'store');
	Route::put('/{author}', 'update');
	Route::delete('/{author}', 'destroy');
});

Route::group(['prefix' => 'books', 'controller' => BookController::class], function () {
	Route::get('/', 'index');
	Route::get('/{book}', 'show');
	Route::post('/', 'store');
	Route::put('/{book}', 'update');
	Route::delete('/{book}', 'destroy');
});

Route::group(['prefix' => 'categorys', 'controller' => CategoryController::class], function () {
	Route::get('/', 'index');
	Route::get('/{category}', 'show');
	Route::post('/', 'store');
	Route::put('/{category}', 'update');
	Route::delete('/{category}', 'destroy');
});
