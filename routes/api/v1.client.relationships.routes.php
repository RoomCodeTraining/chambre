<?php

use App\Http\Controllers\API\ClientRelationshipController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('client-relationships.')->group(function () {
    Route::get('/', [ClientRelationshipController::class, 'index'])->name('index');
    Route::post('/', [ClientRelationshipController::class, 'store'])->name('store');
    Route::get('/{clientRelationship}', [ClientRelationshipController::class, 'show'])->name('show');
    Route::put('/{clientRelationship}', [ClientRelationshipController::class, 'update'])->name('update');
    Route::delete('/{clientRelationship}', [ClientRelationshipController::class, 'destroy'])->name('destroy');
}); 