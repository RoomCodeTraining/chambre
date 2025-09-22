<?php

use App\Http\Controllers\API\NumberPaintElementController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('number-paint-elements.')->group(function () {
    Route::get('/', [NumberPaintElementController::class, 'index'])->name('number-paint-elements.index');
    Route::post('/', [NumberPaintElementController::class, 'store'])->name('number-paint-elements.store');
    Route::get('/{numberPaintElement}', [NumberPaintElementController::class, 'show'])->name('number-paint-elements.show');
    Route::put('/{numberPaintElement}', [NumberPaintElementController::class, 'update'])->name('number-paint-elements.update');
    Route::delete('/{numberPaintElement}', [NumberPaintElementController::class, 'destroy'])->name('number-paint-elements.destroy');
}); 