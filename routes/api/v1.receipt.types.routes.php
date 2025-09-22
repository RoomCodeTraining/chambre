<?php

use App\Http\Controllers\API\ReceiptTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('receipt-types.')->group(function () {
    Route::get('/', [ReceiptTypeController::class, 'index'])->name('receipt-types.index');
    Route::post('/', [ReceiptTypeController::class, 'store'])->name('receipt-types.store');
    Route::get('/{receiptType}', [ReceiptTypeController::class, 'show'])->name('receipt-types.show');
    Route::put('/{receiptType}', [ReceiptTypeController::class, 'update'])->name('receipt-types.update');
    Route::delete('/{receiptType}', [ReceiptTypeController::class, 'destroy'])->name('receipt-types.destroy');
}); 