<?php

use App\Http\Controllers\API\EntityTypeController;
use Illuminate\Support\Facades\Route;

/**
 * EntityTypes
 */
Route::middleware(['auth:sanctum'])->name('entity-types.')->group(function () {
    Route::controller(EntityTypeController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{id}', 'show')->name('show');
        Route::post('', 'store')->name('store');
        Route::put('{id}', 'update')->name('update');
        Route::put('{id}/enable', 'enable')->name('enable');
        Route::put('{id}/disable', 'disable')->name('disable');
    });
});
