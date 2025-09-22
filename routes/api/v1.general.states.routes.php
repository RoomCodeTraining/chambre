<?php

use App\Http\Controllers\API\GeneralStateController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('general-states.')->group(function () {
    Route::get('/', [GeneralStateController::class, 'index'])->name('index');
    Route::post('/', [GeneralStateController::class, 'store'])->name('store');
    Route::get('/{general_state}', [GeneralStateController::class, 'show'])->name('show');
    Route::put('/{general_state}', [GeneralStateController::class, 'update'])->name('update');
    Route::delete('/{general_state}', [GeneralStateController::class, 'destroy'])->name('destroy');
}); 