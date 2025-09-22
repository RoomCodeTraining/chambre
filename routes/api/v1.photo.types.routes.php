<?php

use App\Http\Controllers\API\PhotoTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('photo-types.')->group(function () {
    Route::get('/', [PhotoTypeController::class, 'index'])->name('photo-types.index');
    Route::post('/', [PhotoTypeController::class, 'store'])->name('photo-types.store');
    Route::get('/{photoType}', [PhotoTypeController::class, 'show'])->name('photo-types.show');
    Route::put('/{photoType}', [PhotoTypeController::class, 'update'])->name('photo-types.update');
    Route::delete('/{photoType}', [PhotoTypeController::class, 'destroy'])->name('photo-types.destroy');
}); 