<?php

use App\Http\Controllers\API\BrandController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('brands.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::post('/', [BrandController::class, 'store'])->name('store');
    Route::get('/{brand}', [BrandController::class, 'show'])->name('show');
    Route::put('/{brand}', [BrandController::class, 'update'])->name('update');
    Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('destroy');
}); 