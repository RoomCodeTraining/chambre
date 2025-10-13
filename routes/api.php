<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogsOutDisabledUser;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*===========================
=           V1              =
=============================*/

Route::prefix('v1')->middleware(LogsOutDisabledUser::class)->group(function () {
    Route::prefix('auth')->group(base_path('routes/api/v1.auth.routes.php'));
    Route::prefix('users')->group(base_path('routes/api/v1.users.routes.php'));
    Route::prefix('entity-types')->group(base_path('routes/api/v1.entity.types.routes.php'));
    Route::prefix('entities')->group(base_path('routes/api/v1.entities.routes.php'));
    Route::prefix('vehicles')->group(base_path('routes/api/v1.vehicles.routes.php'));
    Route::prefix('vehicle-models')->group(base_path('routes/api/v1.vehicle.models.routes.php'));
    Route::prefix('vehicle-genres')->group(base_path('routes/api/v1.vehicle.genres.routes.php'));
    Route::prefix('vehicle-energies')->group(base_path('routes/api/v1.vehicle.energies.routes.php'));
    Route::prefix('vehicle-ages')->group(base_path('routes/api/v1.vehicle.ages.routes.php'));
    Route::prefix('depreciation-tables')->group(base_path('routes/api/v1.depreciation.tables.routes.php'));
    Route::prefix('vehicle-states')->group(base_path('routes/api/v1.vehicle.states.routes.php'));
    Route::prefix('brands')->group(base_path('routes/api/v1.brands.routes.php'));
    Route::prefix('colors')->group(base_path('routes/api/v1.colors.routes.php'));
    Route::prefix('workforce-types')->group(base_path('routes/api/v1.workforce.types.routes.php'));
    Route::prefix('workforces')->group(base_path('routes/api/v1.workforces.routes.php'));
    Route::prefix('shock-points')->group(base_path('routes/api/v1.shock.points.routes.php'));
    Route::prefix('shocks')->group(base_path('routes/api/v1.shocks.routes.php'));
    Route::prefix('shock-works')->group(base_path('routes/api/v1.shock.works.routes.php'));
    Route::prefix('supplies')->group(base_path('routes/api/v1.supplies.routes.php'));
    Route::prefix('assignments')->group(base_path('routes/api/v1.assignments.routes.php'));
    Route::prefix('assignment-requests')->group(base_path('routes/api/v1.assignment.requests.routes.php'));
    Route::prefix('technical-conclusions')->group(base_path('routes/api/v1.technical.conclusions.routes.php'));
    Route::prefix('insurers')->group(base_path('routes/api/v1.insurers.routes.php'));
    Route::prefix('repairers')->group(base_path('routes/api/v1.repairers.routes.php'));
    Route::prefix('clients')->group(base_path('routes/api/v1.clients.routes.php'));
    Route::prefix('qr-codes')->group(base_path('routes/api/v1.qr.codes.routes.php'));
    Route::prefix('photos')->group(base_path('routes/api/v1.photos.routes.php'));
    Route::prefix('statuses')->group(base_path('routes/api/v1.statuses.routes.php'));
    Route::prefix('assignment-types')->group(base_path('routes/api/v1.assignment.types.routes.php'));
    Route::prefix('expertise-types')->group(base_path('routes/api/v1.expertise.types.routes.php'));
    Route::prefix('document-transmitteds')->group(base_path('routes/api/v1.document.transmitteds.routes.php'));
    Route::prefix('bodyworks')->group(base_path('routes/api/v1.bodyworks.routes.php'));
    Route::prefix('other-cost-types')->group(base_path('routes/api/v1.other.cost.types.routes.php'));
    Route::prefix('receipt-types')->group(base_path('routes/api/v1.receipt.types.routes.php'));
    Route::prefix('receipts')->group(base_path('routes/api/v1.receipts.routes.php'));
    Route::prefix('other-costs')->group(base_path('routes/api/v1.other.costs.routes.php'));
    Route::prefix('paint-types')->group(base_path('routes/api/v1.paint.types.routes.php'));
    Route::prefix('number-paint-elements')->group(base_path('routes/api/v1.number.paint.elements.routes.php'));
    Route::prefix('painting-prices')->group(base_path('routes/api/v1.painting.prices.routes.php'));
    Route::prefix('paint-product-prices')->group(base_path('routes/api/v1.paint.product.prices.routes.php'));
    Route::prefix('hourly-rates')->group(base_path('routes/api/v1.hourly.rates.routes.php'));
    Route::prefix('work-fees')->group(base_path('routes/api/v1.work.fees.routes.php'));
    Route::prefix('general-states')->group(base_path('routes/api/v1.general.states.routes.php'));
    Route::prefix('invoices')->group(base_path('routes/api/v1.invoices.routes.php'));
    Route::prefix('payments')->group(base_path('routes/api/v1.payments.routes.php'));
    Route::prefix('payment-methods')->group(base_path('routes/api/v1.payment.methods.routes.php'));
    Route::prefix('payment-types')->group(base_path('routes/api/v1.payment.types.routes.php'));
    Route::prefix('checks')->group(base_path('routes/api/v1.checks.routes.php'));
    Route::prefix('payment-historics')->group(base_path('routes/api/v1.payment.historics.routes.php'));
    Route::prefix('banks')->group(base_path('routes/api/v1.banks.routes.php'));
    Route::prefix('photo-types')->group(base_path('routes/api/v1.photo.types.routes.php'));
    Route::prefix('remarks')->group(base_path('routes/api/v1.remarks.routes.php'));
    Route::prefix('ascertainment-types')->group(base_path('routes/api/v1.ascertainment.types.routes.php'));
    Route::prefix('ascertainments')->group(base_path('routes/api/v1.ascertainments.routes.php'));
    Route::prefix('claim-natures')->group(base_path('routes/api/v1.claim.natures.routes.php'));
    Route::prefix('user-actions')->group(base_path('routes/api/v1.user.actions.routes.php'));
    Route::prefix('app-settings')->group(base_path('routes/api/v1.app.settings.routes.php'));
    Route::prefix('client-relationships')->group(base_path('routes/api/v1.client.relationships.routes.php'));
    Route::prefix('vehicle-relationships')->group(base_path('routes/api/v1.vehicle.relationships.routes.php'));
    Route::prefix('insurer-relationships')->group(base_path('routes/api/v1.insurer.relationships.routes.php'));
    Route::prefix('repairer-relationships')->group(base_path('routes/api/v1.repairer.relationships.routes.php'));
    Route::prefix('dashboard')->group(base_path('routes/api/v1.dashboard.routes.php'));
    Route::group([], base_path('routes/api/v1.common.routes.php'));
});