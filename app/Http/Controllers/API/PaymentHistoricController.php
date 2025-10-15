<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentHistoric\UpdatePaymentHistoricRequest;
use App\Http\Requests\PaymentHistoric\CreatePaymentHistoricRequest;
use App\Http\Resources\PaymentHistoric\PaymentHistoricResource;
use App\Models\PaymentHistoric;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des historiques de paiement
 *
 * APIs pour la gestion des historiques de paiement
 */
class PaymentHistoricController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les historiques de paiement
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $paymentHistorics = PaymentHistoric::with('payment:id,reference', 'status:id,code,label')
                                ->latest('created_at')
                                ->useFilters()
                                ->dynamicPaginate();

        return PaymentHistoricResource::collection($paymentHistorics);
    }

    /**
     * Créer un historique de paiement
     *
     * @authenticated
     */
    public function store(CreatePaymentHistoricRequest $request): JsonResponse
    {
        $paymentHistoric = PaymentHistoric::create([
            'payment_id' => $request->payment_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('PaymentHistoric created successfully', new PaymentHistoricResource($paymentHistoric->load('payment:id,reference', 'status:id,code,label')));
    }

    /**
     * Afficher un historique de paiement
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $paymentHistoric = PaymentHistoric::findOrFail(PaymentHistoric::keyFromHashId($id));

        return $this->responseSuccess(null, new PaymentHistoricResource($paymentHistoric->load('payment:id,reference', 'status:id,code,label')));
    }

    public function update(UpdatePaymentHistoricRequest $request, $id): JsonResponse
    {
        $paymentHistoric = PaymentHistoric::findOrFail(PaymentHistoric::keyFromHashId($id));
        $paymentHistoric->update([
            'payment_id' => $request->payment_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('PaymentHistoric updated Successfully', new PaymentHistoricResource($paymentHistoric->load('payment:id,reference', 'status:id,code,label')));
    }

    /**
     * Supprimer un historique de paiement
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $paymentHistoric = PaymentHistoric::findOrFail(PaymentHistoric::keyFromHashId($id));

        // $paymentHistoric->delete();

        return $this->responseDeleted();
    }

   
}
