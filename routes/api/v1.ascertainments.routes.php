<?php

use App\Http\Controllers\API\AscertainmentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('ascertainments.')->group(function () {
    Route::get('/', [AscertainmentController::class, 'index'])->name('ascertainments.index');
    Route::post('/', [AscertainmentController::class, 'store'])->name('ascertainments.store');
    Route::get('/{ascertainment}', [AscertainmentController::class, 'show'])->name('ascertainments.show');
    Route::put('/{ascertainment}', [AscertainmentController::class, 'update'])->name('ascertainments.update');
    Route::delete('/{ascertainment}', [AscertainmentController::class, 'destroy'])->name('ascertainments.destroy');
}); 