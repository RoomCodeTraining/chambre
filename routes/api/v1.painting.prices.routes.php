<?php

use App\Http\Controllers\API\PaintingPriceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('painting-prices.')->group(function () {
    Route::get('/', [PaintingPriceController::class, 'index'])->name('painting-prices.index');
    Route::post('/', [PaintingPriceController::class, 'store'])->name('painting-prices.store');
    Route::get('/{paintingPrice}', [PaintingPriceController::class, 'show'])->name('painting-prices.show');
    Route::put('/{paintingPrice}', [PaintingPriceController::class, 'update'])->name('painting-prices.update');
    Route::delete('/{paintingPrice}', [PaintingPriceController::class, 'destroy'])->name('painting-prices.destroy');
}); 