<?php

use App\Http\Controllers\API\AssignmentMessageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('assignment-messages.')->group(function () {
    Route::get('/', [AssignmentMessageController::class, 'index'])->name('index');
    Route::post('/', [AssignmentMessageController::class, 'store'])->name('store');
    Route::get('/{assignment_message}', [AssignmentMessageController::class, 'show'])->name('show');
    Route::put('/{assignment_message}', [AssignmentMessageController::class, 'update'])->name('update');
    Route::delete('/{assignment_message}', [AssignmentMessageController::class, 'destroy'])->name('destroy');
});