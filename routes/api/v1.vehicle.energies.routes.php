<?php

use App\Http\Controllers\API\VehicleEnergyController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('vehicle-energies.')->group(function () {
    Route::get('/', [VehicleEnergyController::class, 'index'])->name('index');
    Route::post('/', [VehicleEnergyController::class, 'store'])->name('store');
    Route::get('/{vehicle_energy}', [VehicleEnergyController::class, 'show'])->name('show');
    Route::put('/{vehicle_energy}', [VehicleEnergyController::class, 'update'])->name('update');
    Route::delete('/{vehicle_energy}', [VehicleEnergyController::class, 'destroy'])->name('destroy');
}); 