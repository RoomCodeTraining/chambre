<?php

use App\Http\Controllers\API\ExpertiseTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('expertise.types.')->group(function () {
    Route::get('/', [ExpertiseTypeController::class, 'index'])->name('index');
    Route::post('/', [ExpertiseTypeController::class, 'store'])->name('store');
    Route::get('/{expertise_type}', [ExpertiseTypeController::class, 'show'])->name('show');
    Route::put('/{expertise_type}', [ExpertiseTypeController::class, 'update'])->name('update');
    Route::delete('/{expertise_type}', [ExpertiseTypeController::class, 'destroy'])->name('destroy');
}); 