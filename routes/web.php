<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReturnedController;
use App\Http\Controllers\HomeController;
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
    return view('/home');
});
Route::get('/home', function () {
    return view('/home');
});
Auth::routes();
Route::group(['middleware' => ['web', 'auth']], function () {
		Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
		Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
		Route::resource('car', CarController::class);
		Route::resource('rent', RentController::class);
		Route::resource('returned', ReturnedController::class);
});
