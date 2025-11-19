<?php

use App\Http\Controllers\API\RoleController;
use Illuminate\Support\Facades\Route;

/**
 * Statuss
 */
Route::middleware(['auth:sanctum'])->name('roles.')->group(function () {
    Route::controller(RoleController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('list/all', 'list')->name('list');
        Route::post('', 'store')->name('store');
        Route::put('{role}', 'update')->name('update');
        Route::post('{role}/give-permission-to-role', 'givePermissionToRole')->name('givePermissionToRole');
        Route::post('{role}/revoke-permission-to-role', 'revokePermissionToRole')->name('revokePermissionToRole');
    });
});
