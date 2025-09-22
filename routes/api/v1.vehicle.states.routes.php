<?php

use App\Http\Controllers\API\VehicleStateController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('vehicle-states.')->group(function () {
    Route::get('/', [VehicleStateController::class, 'index'])->name('index');
    Route::post('/', [VehicleStateController::class, 'store'])->name('store');
    Route::get('/{vehicle_state}', [VehicleStateController::class, 'show'])->name('show');
    Route::put('/{vehicle_state}', [VehicleStateController::class, 'update'])->name('update');
    Route::delete('/{vehicle_state}', [VehicleStateController::class, 'destroy'])->name('destroy');
}); 