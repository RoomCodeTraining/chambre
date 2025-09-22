<?php

use App\Http\Controllers\API\ColorController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('colors.')->group(function () {
    Route::get('/', [ColorController::class, 'index'])->name('colors.index');
    Route::post('/', [ColorController::class, 'store'])->name('colors.store');
    Route::get('/{color}', [ColorController::class, 'show'])->name('colors.show');
    Route::put('/{color}', [ColorController::class, 'update'])->name('colors.update');
    Route::delete('/{color}', [ColorController::class, 'destroy'])->name('colors.destroy');
}); 