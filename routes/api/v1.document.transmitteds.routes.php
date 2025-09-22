<?php

use App\Http\Controllers\API\DocumentTransmittedController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('document.transmitteds.')->group(function () {
    Route::get('/', [DocumentTransmittedController::class, 'index'])->name('index');
    Route::post('/', [DocumentTransmittedController::class, 'store'])->name('store');
    Route::get('/{document_transmitted}', [DocumentTransmittedController::class, 'show'])->name('show');
    Route::put('/{document_transmitted}', [DocumentTransmittedController::class, 'update'])->name('update');
    Route::delete('/{document_transmitted}', [DocumentTransmittedController::class, 'destroy'])->name('destroy');
}); 