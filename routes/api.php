<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrdersController;

Route::group(['prefix' => 'auth', 'as' => 'api.'], function () {
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::group(['prefix' => '/orders', 'as' => 'orders.'], function () {
    Route::get('/', [OrdersController::class, 'index'])->name('index');
    Route::get('/{id}', [OrdersController::class, 'show'])->name('show');
    Route::post('/', [OrdersController::class, 'store'])->name('store');
    Route::delete('/{id}', [OrdersController::class, 'destroy'])->name('destroy');
});
