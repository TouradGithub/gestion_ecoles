<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/',  [App\Http\Controllers\HomeController::class, 'index'])->name('selection');


Auth::routes();


Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}',[App\Http\Controllers\Auth\LoginController::class,'loginForm'])->middleware('guest')->name('login.show');

    Route::post('/login','LoginController@login')->name('login');

    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');


});

