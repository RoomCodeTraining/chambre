<?php

use App\Http\Controllers\API\ShockPointController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('shock-points.')->group(function () {
    Route::get('/', [ShockPointController::class, 'index'])->name('shock-points.index');
    Route::post('/', [ShockPointController::class, 'store'])->name('shock-points.store');
    Route::get('/{shock_point}', [ShockPointController::class, 'show'])->name('shock-points.show');
    Route::put('/{shock_point}', [ShockPointController::class, 'update'])->name('shock-points.update');
    Route::delete('/{shock_point}', [ShockPointController::class, 'destroy'])->name('shock-points.destroy');
}); 