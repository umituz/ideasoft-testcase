<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrdersController;

Route::group(['prefix' => '/orders', 'as' => 'orders.'], function () {
    Route::get('/', [OrdersController::class, 'index'])->name('index');
    Route::get('/{id}', [OrdersController::class, 'show'])->name('show');
    Route::post('/', [OrdersController::class, 'store'])->name('store');
    Route::put('/{id}', [OrdersController::class, 'update'])->name('update');
    Route::delete('/{id}', [OrdersController::class, 'destroy'])->name('destroy');
});

