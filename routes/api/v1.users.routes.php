<?php

use App\Http\Controllers\API\DisableUserController;
use App\Http\Controllers\API\EnableUserController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UsersStatisticController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->name('users.')->group(function () {
    // Route::post('{user}/enable', EnableUserController::class)->name('enable');
    // Route::delete('{user}/disable', DisableUserController::class)->name('disable');

    Route::controller(UserController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{id}', 'show')->name('show');
        Route::post('', 'store')->name('store');

        // TODO: Should have separate routes for updating user & changing avatar
        Route::post('{id}', 'update')->name('update');
        Route::put('{id}/enable', 'enable')->name('enable');
        Route::put('{id}/disable', 'disable')->name('disable');
        Route::post('{id}/reset', 'reset')->name('reset');
        Route::post('update/profile', 'update_profile')->name('update-profile');
        Route::post('{id}/reset-user-password', 'reset_user_password')->name('reset-user-password');
    });
});
Route::post('users/reset-password', [UserController::class, 'reset_password'])->name('reset-password');
