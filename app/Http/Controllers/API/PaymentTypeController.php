<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\PaymentType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentType\PaymentTypeResource;
use App\Http\Requests\PaymentType\CreatePaymentTypeRequest;
use App\Http\Requests\PaymentType\UpdatePaymentTypeRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des types de paiement
 *
 * APIs pour la gestion des types de paiement
 */
class PaymentTypeController extends Controller
{
    use ApiResponse; 

    public function __construct()
    {

    }

    /**
     * Lister tous les types de paiement
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $paymentTypes = PaymentType::with('status:id,code,label')
                                ->latest('created_at')
                                ->useFilters()
                                ->dynamicPaginate();

        return PaymentTypeResource::collection($paymentTypes);
    }

    /**
     * Créer un type de paiement
     *
     * @authenticated
     */
    public function store(CreatePaymentTypeRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $paymentType = PaymentType::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('PaymentType created successfully', new PaymentTypeResource($paymentType->load('status:id,code,label')));
    }

    /**
     * Afficher un type de paiement
     *
     * @authenticated
     */
    public function show(PaymentType $paymentType): JsonResponse
    {
        return $this->responseSuccess(null, new PaymentTypeResource($paymentType->load('status:id,code,label')));
    }

    /**
     * Mettre à jour un type de paiement
     *
     * @authenticated
     */
    public function update(UpdatePaymentTypeRequest $request, $id): JsonResponse
    {
        $paymentType = PaymentType::findOrFail($id);
        $paymentType->update([
            'code' => $request->code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('PaymentType updated Successfully', new PaymentTypeResource($paymentType->load('status:id,code,label')));
    }

    /**
     * Supprimer un type de paiement
     *
     * @authenticated
     */
    public function destroy(PaymentType $paymentType): JsonResponse
    {
        // $paymentType->delete();

        return $this->responseDeleted();
    }

   
}
