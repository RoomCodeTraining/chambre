<?php

use App\Http\Controllers\API\ComparisonController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('comparisons.')->group(function () {
    Route::get('/', [ComparisonController::class, 'index'])->name('comparisons.index');
    Route::post('/', [ComparisonController::class, 'store'])->name('comparisons.store');
    Route::get('/{comparison}', [ComparisonController::class, 'show'])->name('comparisons.show');
    Route::put('/{comparison}', [ComparisonController::class, 'update'])->name('comparisons.update');
    Route::delete('/{comparison}', [ComparisonController::class, 'destroy'])->name('comparisons.destroy');
});

