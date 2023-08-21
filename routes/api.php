<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// payment service api
Route::prefix('payment')->group(function () {
    Route::get('callback', [PaymentController::class, 'acquiringCallback']); // callback с банка
});


// MAIN monolit/service api
Route::middleware(AuthRequest::class)->group(function () {
    Route::prefix('payment')->group(function () {
        Route::post('bill', [PaymentController::class, 'createAccountPaymentPdf']); // запрос на получения счета
        Route::post('acquiring', [PaymentController::class, 'createAcquiringPayment']); // запрос на эквайринг
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', 'index')->name('orders.index');
        Route::get('/{id}', 'show')->name('orders.show');
        Route::post('/', 'store')->name('orders.create');
        Route::delete('/{id}', 'destroy')->name('orders.delete');
    });
});