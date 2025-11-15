<?php

use App\Http\Controllers\API\PaymentTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('payment-types.')->group(function () {
    Route::get('/', [PaymentTypeController::class, 'index'])->name('payment-types.index');
    Route::post('/', [PaymentTypeController::class, 'store'])->name('payment-types.store');
    Route::get('/{paymentType}', [PaymentTypeController::class, 'show'])->name('payment-types.show');
    Route::put('/{paymentType}', [PaymentTypeController::class, 'update'])->name('payment-types.update');
    Route::delete('/{paymentType}', [PaymentTypeController::class, 'destroy'])->name('payment-types.destroy');
    Route::put('/{paymentType}/enable', [PaymentTypeController::class, 'enable'])->name('payment-types.enable');
    Route::put('/{paymentType}/disable', [PaymentTypeController::class, 'disable'])->name('payment-types.disable');
}); 