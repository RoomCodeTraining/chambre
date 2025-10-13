<?php

use App\Http\Controllers\API\RepairerRelationshipController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('repairer-relationships.')->group(function () {
    Route::get('/', [RepairerRelationshipController::class, 'index'])->name('index');
    Route::post('/', [RepairerRelationshipController::class, 'store'])->name('store');
    Route::get('/{repairerRelationship}', [RepairerRelationshipController::class, 'show'])->name('show');
    Route::put('/{repairerRelationship}', [RepairerRelationshipController::class, 'update'])->name('update');
    Route::put('/{repairerRelationship}/enable', [RepairerRelationshipController::class, 'enable'])->name('enable');
    Route::put('/{repairerRelationship}/disable', [RepairerRelationshipController::class, 'disable'])->name('disable');
}); 