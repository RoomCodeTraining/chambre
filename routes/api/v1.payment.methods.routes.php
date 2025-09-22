<?php

use App\Http\Controllers\API\PaymentMethodController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('payment-methods.')->group(function () {
    Route::get('/', [PaymentMethodController::class, 'index'])->name('payment-methods.index');
    Route::post('/', [PaymentMethodController::class, 'store'])->name('payment-methods.store');
    Route::get('/{paymentMethod}', [PaymentMethodController::class, 'show'])->name('payment-methods.show');
    Route::put('/{paymentMethod}', [PaymentMethodController::class, 'update'])->name('payment-methods.update');
    Route::delete('/{paymentMethod}', [PaymentMethodController::class, 'destroy'])->name('payment-methods.destroy');
}); 