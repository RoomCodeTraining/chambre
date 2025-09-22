<?php

use App\Http\Controllers\API\TechnicalConclusionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('technical-conclusions.')->group(function () {
    Route::get('/', [TechnicalConclusionController::class, 'index'])->name('technical-conclusions.index');
    Route::post('/', [TechnicalConclusionController::class, 'store'])->name('technical-conclusions.store');
    Route::get('/{technicalConclusion}', [TechnicalConclusionController::class, 'show'])->name('technical-conclusions.show');
    Route::put('/{technicalConclusion}', [TechnicalConclusionController::class, 'update'])->name('technical-conclusions.update');
    Route::delete('/{technicalConclusion}', [TechnicalConclusionController::class, 'destroy'])->name('technical-conclusions.destroy');
}); 