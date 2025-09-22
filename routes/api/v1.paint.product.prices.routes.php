<?php

use App\Http\Controllers\API\PaintProductPriceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('paint-product-prices.')->group(function () {
    Route::get('/', [PaintProductPriceController::class, 'index'])->name('paint-product-prices.index');
    Route::post('/', [PaintProductPriceController::class, 'store'])->name('paint-product-prices.store');
    Route::get('/{paintProductPrice}', [PaintProductPriceController::class, 'show'])->name('paint-product-prices.show');
    Route::put('/{paintProductPrice}', [PaintProductPriceController::class, 'update'])->name('paint-product-prices.update');
    Route::delete('/{paintProductPrice}', [PaintProductPriceController::class, 'destroy'])->name('paint-product-prices.destroy');
}); 