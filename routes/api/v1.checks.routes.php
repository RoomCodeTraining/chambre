<?php

use App\Http\Controllers\API\CheckController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('checks.')->group(function () {
    Route::get('/', [CheckController::class, 'index'])->name('checks.index');
    Route::post('/', [CheckController::class, 'store'])->name('checks.store');
    Route::get('/{check}', [CheckController::class, 'show'])->name('checks.show');
    Route::put('/{check}', [CheckController::class, 'update'])->name('checks.update');
    Route::delete('/{check}', [CheckController::class, 'destroy'])->name('checks.destroy');
}); 