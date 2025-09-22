<?php

use App\Http\Controllers\API\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('invoices.')->group(function () {
    Route::get('/', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::post('/', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::put('/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
    Route::delete('/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
    Route::put('/{invoice}/cancel', [InvoiceController::class, 'cancel'])->name('invoices.cancel');
    Route::put('/{invoice}/generate', [InvoiceController::class, 'generate'])->name('invoices.generate');
    Route::get('/get/statistics', [InvoiceController::class, 'statistics'])->name('invoices.statistics');
}); 