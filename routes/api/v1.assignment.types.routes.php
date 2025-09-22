<?php

use App\Http\Controllers\API\AssignmentTypeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('assignment.types.')->group(function () {
    Route::get('/', [AssignmentTypeController::class, 'index'])->name('index');
    Route::post('/', [AssignmentTypeController::class, 'store'])->name('store');
    Route::get('/{assignment_type}', [AssignmentTypeController::class, 'show'])->name('show');
    Route::put('/{assignment_type}', [AssignmentTypeController::class, 'update'])->name('update');
    Route::delete('/{assignment_type}', [AssignmentTypeController::class, 'destroy'])->name('destroy');
}); 