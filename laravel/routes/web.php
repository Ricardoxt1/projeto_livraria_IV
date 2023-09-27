<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login/{erro?},{sucess?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('site.login');

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('site.register');

Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'create'])->name('site.register');

