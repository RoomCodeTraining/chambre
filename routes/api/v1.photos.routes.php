<?php

use App\Http\Controllers\API\PhotoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('photos.')->group(function () {
    Route::get('/', [PhotoController::class, 'index'])->name('photos.index');
    Route::post('/', [PhotoController::class, 'storeMultiple'])->name('photos.storeMultiple');
    // Route::post('/multiple', [PhotoController::class, 'storeMultiple'])->name('photos.multiple');
    Route::get('/{photo}', [PhotoController::class, 'show'])->name('photos.show');
    Route::post('/{photo}', [PhotoController::class, 'update'])->name('photos.update');
    Route::put('/{photo}/cover', [PhotoController::class, 'makeCover'])->name('photos.makeCover');
    Route::delete('/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
}); 