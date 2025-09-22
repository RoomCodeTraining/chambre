<?php

use App\Http\Controllers\API\ReceiptController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('receipts.')->group(function () {
    Route::get('/', [ReceiptController::class, 'index'])->name('receipts.index');
    Route::post('/', [ReceiptController::class, 'store'])->name('receipts.store');
    Route::post('/calculate', [ReceiptController::class, 'calculate'])->name('receipts.calculate');
    Route::get('/{receipt}', [ReceiptController::class, 'show'])->name('receipts.show');
    Route::put('/{receipt}', [ReceiptController::class, 'update'])->name('receipts.update');
    Route::delete('/{receipt}', [ReceiptController::class, 'destroy'])->name('receipts.destroy');
}); 