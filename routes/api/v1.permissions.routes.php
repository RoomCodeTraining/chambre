<?php

use App\Http\Controllers\API\PermissionController;
use Illuminate\Support\Facades\Route;

/**
 * Permissions
 */
Route::middleware(['auth:sanctum'])->name('permissions.')->group(function () {
    Route::controller(PermissionController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('', 'store')->name('store');
        Route::put('{permission}', 'update')->name('update');
    });
});
