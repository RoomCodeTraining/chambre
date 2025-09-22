<?php

use App\Http\Controllers\API\SupplyController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('supplies.')->group(function () {
    Route::get('/', [SupplyController::class, 'index'])->name('supplies.index');
    Route::post('/', [SupplyController::class, 'store'])->name('supplies.store');
    Route::get('/{supply}', [SupplyController::class, 'show'])->name('supplies.show');
    Route::put('/{supply}', [SupplyController::class, 'update'])->name('supplies.update');
    Route::delete('/{supply}', [SupplyController::class, 'destroy'])->name('supplies.destroy');
}); 