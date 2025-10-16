<?php

use App\Http\Controllers\API\AssignmentMessageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('assignment-messages.')->group(function () {
    Route::get('/', [AssignmentMessageController::class, 'index'])->name('assignment-messages.index');
    Route::post('/', [AssignmentMessageController::class, 'store'])->name('assignment-messages.store');
    Route::get('/{assignment_message}', [AssignmentMessageController::class, 'show'])->name('assignment-messages.show');
    Route::put('/{assignment_message}', [AssignmentMessageController::class, 'update'])->name('assignment-messages.update');
    Route::delete('/{assignment_message}', [AssignmentMessageController::class, 'destroy'])->name('assignment-messages.destroy');
});