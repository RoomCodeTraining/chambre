<?php

use App\Http\Controllers\API\PaymentHistoricController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('payment-historics.')->group(function () {
    Route::get('/', [PaymentHistoricController::class, 'index'])->name('payment-historics.index');
    Route::post('/', [PaymentHistoricController::class, 'store'])->name('payment-historics.store');
    Route::get('/{paymentHistoric}', [PaymentHistoricController::class, 'show'])->name('payment-historics.show');
    Route::put('/{paymentHistoric}', [PaymentHistoricController::class, 'update'])->name('payment-historics.update');
    Route::delete('/{paymentHistoric}', [PaymentHistoricController::class, 'destroy'])->name('payment-historics.destroy');
}); 