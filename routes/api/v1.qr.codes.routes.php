<?php

use App\Http\Controllers\API\QrCodeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('qr-codes.')->group(function () {
    Route::get('/', [QrCodeController::class, 'index'])->name('qr-codes.index');
    Route::post('/', [QrCodeController::class, 'store'])->name('qr-codes.store');
    Route::get('/{qrCode}', [QrCodeController::class, 'show'])->name('qr-codes.show');
    Route::put('/{qrCode}', [QrCodeController::class, 'update'])->name('qr-codes.update');
    Route::delete('/{qrCode}', [QrCodeController::class, 'destroy'])->name('qr-codes.destroy');
}); 