<?php

use App\Http\Controllers\API\InsurerRelationshipController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('insurer-relationships.')->group(function () {
    Route::get('/', [InsurerRelationshipController::class, 'index'])->name('index');
    Route::post('/', [InsurerRelationshipController::class, 'store'])->name('store');
    Route::get('/{insurerRelationship}', [InsurerRelationshipController::class, 'show'])->name('show');
    Route::put('/{insurerRelationship}', [InsurerRelationshipController::class, 'update'])->name('update');
    Route::put('/{insurerRelationship}/enable', [InsurerRelationshipController::class, 'enable'])->name('enable');
    Route::put('/{insurerRelationship}/disable', [InsurerRelationshipController::class, 'disable'])->name('disable');
}); 