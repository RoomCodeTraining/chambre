<?php

use App\Http\Controllers\API\VehicleModelController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('vehicle-models.')->group(function () {
    Route::get('/', [VehicleModelController::class, 'index'])->name('index');
    Route::post('/', [VehicleModelController::class, 'store'])->name('store');
    Route::get('/{vehicle_model}', [VehicleModelController::class, 'show'])->name('show');
    Route::put('/{vehicle_model}', [VehicleModelController::class, 'update'])->name('update');
    Route::delete('/{vehicle_model}', [VehicleModelController::class, 'destroy'])->name('destroy');
}); 