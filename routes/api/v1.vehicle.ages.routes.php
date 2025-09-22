<?php

use App\Http\Controllers\API\VehicleAgeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('vehicle-ages.')->group(function () {
    Route::get('/', [VehicleAgeController::class, 'index'])->name('index');
    Route::post('/', [VehicleAgeController::class, 'store'])->name('store');
    Route::get('/{vehicle_age}', [VehicleAgeController::class, 'show'])->name('show');
    Route::put('/{vehicle_age}', [VehicleAgeController::class, 'update'])->name('update');
    Route::delete('/{vehicle_age}', [VehicleAgeController::class, 'destroy'])->name('destroy');
}); 