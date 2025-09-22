<?php

use App\Http\Controllers\API\StatusController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('statuses.')->group(function () {
    Route::get('/', [StatusController::class, 'index'])->name('statuses.index');
    Route::post('/', [StatusController::class, 'store'])->name('statuses.store');
    Route::get('/{status}', [StatusController::class, 'show'])->name('statuses.show');
    Route::put('/{status}', [StatusController::class, 'update'])->name('statuses.update');
    Route::delete('/{status}', [StatusController::class, 'destroy'])->name('statuses.destroy');
}); 