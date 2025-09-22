<?php

use App\Http\Controllers\API\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
});
