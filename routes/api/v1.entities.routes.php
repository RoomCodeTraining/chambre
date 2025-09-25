<?php

use App\Http\Controllers\API\DisableEntityController;
use App\Http\Controllers\API\EnableEntityController;
use App\Http\Controllers\API\EntityController;
use Illuminate\Support\Facades\Route;

/**
 * Entities
 */
Route::middleware(['auth:sanctum'])->name('entities.')->group(function () {
    Route::controller(EntityController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{id}', 'show')->name('show');
        Route::post('', 'store')->name('store');

        // TODO: Should have separate routes for updating entity & changing logo
        Route::post('{id}', 'update')->name('update');
        Route::put('{id}/enable', 'enable')->name('enable');
        Route::put('{id}/disable', 'disable')->name('disable');
    });

    // Route::post('{entity}/enable', EnableEntityController::class)->name('enable');
    // Route::delete('{entity}/disable', DisableEntityController::class)->name('disable');
});
