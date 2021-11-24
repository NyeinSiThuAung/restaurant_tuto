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

Route::get('/', [App\Http\Controllers\OrderController::class, 'index'])->name('order.form');

Route::post('/order_submit', [App\Http\Controllers\OrderController::class, 'submit'])->name('order.submit');

Route::get('/order', [App\Http\Controllers\DishesController::class, 'order'])->name('kitchen.order');

Route::resource('/dish', App\Http\Controllers\DishesController::class);

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
    'confirm' => false,
  ]);

