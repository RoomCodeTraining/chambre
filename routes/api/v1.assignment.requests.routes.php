<?php

use App\Http\Controllers\API\AssignmentRequestController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('assignment.requests.')->group(function () {
    Route::get('/', [AssignmentRequestController::class, 'index'])->name('index');
    Route::get('/{assignment_request}', [AssignmentRequestController::class, 'show'])->name('show');
    Route::put('/{assignment_request}', [AssignmentRequestController::class, 'update'])->name('update');
    Route::delete('/{assignment_request}', [AssignmentRequestController::class, 'destroy'])->name('destroy');
}); 
Route::post('assignment-requests', [AssignmentRequestController::class, 'store'])->name('store');