<?php

use App\Http\Controllers\API\WorkforceTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('workforce-types.')->group(function () {
    Route::get('/', [WorkforceTypeController::class, 'index'])->name('workforce-types.index');
    Route::post('/', [WorkforceTypeController::class, 'store'])->name('workforce-types.store');
    Route::get('/{workforce_type}', [WorkforceTypeController::class, 'show'])->name('workforce-types.show');
    Route::put('/{workforce_type}', [WorkforceTypeController::class, 'update'])->name('workforce-types.update');
    Route::delete('/{workforce_type}', [WorkforceTypeController::class, 'destroy'])->name('workforce-types.destroy');
}); 