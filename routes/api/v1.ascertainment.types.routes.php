<?php

use App\Http\Controllers\API\AscertainmentTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('ascertainment-types.')->group(function () {
    Route::get('/', [AscertainmentTypeController::class, 'index'])->name('ascertainment-types.index');
    Route::post('/', [AscertainmentTypeController::class, 'store'])->name('ascertainment-types.store');
    Route::get('/{ascertainment_type}', [AscertainmentTypeController::class, 'show'])->name('ascertainment-types.show');
    Route::put('/{ascertainment_type}', [AscertainmentTypeController::class, 'update'])->name('ascertainment-types.update');
    Route::delete('/{ascertainment_type}', [AscertainmentTypeController::class, 'destroy'])->name('ascertainment-types.destroy');
}); 