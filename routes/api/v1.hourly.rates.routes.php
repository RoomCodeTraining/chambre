<?php

use App\Http\Controllers\API\HourlyRateController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('hourly-rates.')->group(function () {
    Route::get('/', [HourlyRateController::class, 'index'])->name('hourly-rates.index');
    Route::post('/', [HourlyRateController::class, 'store'])->name('hourly-rates.store');
    Route::get('/{hourlyRate}', [HourlyRateController::class, 'show'])->name('hourly-rates.show');
    Route::put('/{hourlyRate}', [HourlyRateController::class, 'update'])->name('hourly-rates.update');
    Route::delete('/{hourlyRate}', [HourlyRateController::class, 'destroy'])->name('hourly-rates.destroy');
}); 