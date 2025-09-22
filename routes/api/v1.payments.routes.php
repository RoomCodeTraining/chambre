<?php

use App\Http\Controllers\API\PaymentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('payments.')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('/', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/{payment}', [PaymentController::class, 'show'])->name('payments.show');
    Route::put('/{payment}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');
    Route::put('/{payment}/cancel', [PaymentController::class, 'cancel'])->name('payments.cancel');
    Route::get('/get/statistics', [PaymentController::class, 'statistics'])->name('payments.statistics');
}); 