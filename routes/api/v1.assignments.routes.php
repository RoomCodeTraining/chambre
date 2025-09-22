<?php

use App\Http\Controllers\API\AssignmentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('assignments.')->group(function () {
    /** @uses AssignmentController::index */
    Route::get('/', [AssignmentController::class, 'index'])->name('index');

    /** @uses AssignmentController::store */
    Route::post('/', [AssignmentController::class, 'store'])->name('store');
    Route::post('/create-work-sheet/{assignment}', [AssignmentController::class, 'create_work_sheet'])->name('create-work-sheet');

    /** @uses AssignmentController::send_work_sheet */
    Route::post('/resend-work-sheet/{assignment}', [AssignmentController::class, 'resend_work_sheet'])->name('resend-work-sheet');

    /** @uses AssignmentController::add_work_sheet_photo */
    Route::post('/add-work-sheet-photo/{assignment}', [AssignmentController::class, 'add_work_sheet_photo'])->name('add-work-sheet-photo');

    /** @uses AssignmentController::calculate */
    Route::post('/calculate', [AssignmentController::class, 'calculate'])->name('calculate');

    /** @uses AssignmentController::calculate_evaluation */
    Route::post('/calculate-evaluation', [AssignmentController::class, 'calculate_evaluation'])->name('calculate-evaluation');

    /** @uses AssignmentController::realize */
    Route::put('/realize/{assignment}', [AssignmentController::class, 'realize'])->name('realize');

    /** @uses AssignmentController::edit */
    Route::put('/edit/{assignment}', [AssignmentController::class, 'edit'])->name('edit');

    /** @uses AssignmentController::evaluate */
    Route::put('/evaluate/{assignment}', [AssignmentController::class, 'evaluate'])->name('evaluate');

    /** @uses AssignmentController::update */
    Route::put('/update/{assignment}', [AssignmentController::class, 'update'])->name('update');

    /** @uses AssignmentController::updateRealized */
    Route::put('/update-realize/{assignment}', [AssignmentController::class, 'updateRealize'])->name('update-realize');

    /** @uses AssignmentController::updateEdit */
    Route::put('/update-edit/{assignment}', [AssignmentController::class, 'updateEdit'])->name('updateEdit');

    /** @uses AssignmentController::validate */
    Route::put('/validate/{assignment}', [AssignmentController::class, 'validate'])->name('validate');

    /** @uses AssignmentController::unvalidate */
    Route::put('/unvalidate/{assignment}', [AssignmentController::class, 'unvalidate'])->name('unvalidate');

    /** @uses AssignmentController::validateByRepairer */
    Route::put('/validate-by-repairer/{assignment}', [AssignmentController::class, 'validateByRepairer'])->name('validateByRepairer');

    /** @uses AssignmentController::validateByExpert */
    Route::put('/validate-by-expert/{assignment}', [AssignmentController::class, 'validateByExpert'])->name('validateByExpert');

    /** @uses AssignmentController::unvalidateByExpert */
    Route::put('/unvalidate-by-expert/{assignment}', [AssignmentController::class, 'unvalidateByExpert'])->name('unvalidateByExpert');

    /** @uses AssignmentController::show */
    Route::get('/{assignment}', [AssignmentController::class, 'show'])->name('show');

    /** @uses AssignmentController::close */
    Route::put('/{assignment}/close', [AssignmentController::class, 'close'])->name('close');

    /** @uses AssignmentController::cancel */
    Route::put('/{assignment}/cancel', [AssignmentController::class, 'cancel'])->name('cancel');

    /** @uses AssignmentController::generate */
    Route::put('/{assignment}/generate', [AssignmentController::class, 'generate'])->name('generate');

    /** @uses AssignmentController::orderShocks */
    Route::put('/{assignment}/order-shocks', [AssignmentController::class, 'orderShocks'])->name('order-shocks');

    /** @uses AssignmentController::orderPhotos */
    Route::put('/{assignment}/order-photos', [AssignmentController::class, 'orderPhotos'])->name('order-photos');

    /** @uses AssignmentController::get_assignment_edition_time_to_expired */
    Route::get('/get/assignment-edition-time-to-expired', [AssignmentController::class, 'get_assignment_edition_time_to_expired'])->name('get_assignment_edition_time_to_expired');

    /** @uses AssignmentController::get_assignment_recovery_time_to_expired */
    Route::get('/get/assignment-recovery-time-to-expired', [AssignmentController::class, 'get_assignment_recovery_time_to_expired'])->name('get_assignment_recovery_time_to_expired');

    /** @uses AssignmentController::export */
    Route::get('/get/export', [AssignmentController::class, 'export'])->name('export');

    /** @uses AssignmentController::statistics */
    Route::get('/get/statistics', [AssignmentController::class, 'statistics'])->name('statistics');
}); 