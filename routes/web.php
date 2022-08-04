<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// For Database Access - remote DB
Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index');

Route::post('products/{id}/purchase', [App\Http\Controllers\ProductController::class, 'purchase'])->name('products.purchase');
Route::get('show/{id}', [App\Http\Controllers\ProductController::class, 'show']);

