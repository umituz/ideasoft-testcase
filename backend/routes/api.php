<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Category\CategoriesController;
use App\Http\Controllers\Api\Order\OrderDiscountsController;
use App\Http\Controllers\Api\Order\OrdersController;
use App\Http\Controllers\Api\Product\ProductsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('/', [ProductsController::class, 'index'])->name('index');
    Route::get('/{slug}', [ProductsController::class, 'show'])->name('show');
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => '/orders', 'as' => 'orders.'], function () {
        Route::get('/', [OrdersController::class, 'index'])->name('index');
        Route::get('/{id}', [OrdersController::class, 'show'])->name('show');
        Route::post('/', [OrdersController::class, 'store'])->name('store');
        Route::delete('/{id}', [OrdersController::class, 'destroy'])->name('destroy');

        Route::get('/{id}/discounts', [OrderDiscountsController::class, 'index'])->name('discounts');
    });
});
