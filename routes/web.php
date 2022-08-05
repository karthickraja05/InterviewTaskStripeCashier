<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'main']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::post('products/{id}/purchase', [ProductController::class, 'purchase'])->name('products.purchase');
Route::get('show/{id}', [ProductController::class, 'show']);


// For Database Access - remote DB
Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index');