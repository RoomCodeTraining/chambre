<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentMethod\UpdatePaymentMethodRequest;
use App\Http\Requests\PaymentMethod\CreatePaymentMethodRequest;
use App\Http\Resources\PaymentMethod\PaymentMethodResource;
use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\PaymentMethod;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des méthodes de paiement
 *
 * APIs pour la gestion des méthodes de paiement
 */
class PaymentMethodController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les méthodes de paiement
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $paymentMethods = PaymentMethod::with('status:id,code,label')
                                ->latest('created_at')
                                ->useFilters()
                                ->dynamicPaginate();

        return PaymentMethodResource::collection($paymentMethods);
    }

    /**
     * Créer une méthode de paiement
     *
     * @authenticated
     */
    public function store(CreatePaymentMethodRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $paymentMethod = PaymentMethod::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('PaymentMethod created successfully', new PaymentMethodResource($paymentMethod->load('status:id,code,label')));
    }

    /**
     * Afficher une méthode de paiement
     *
     * @authenticated
     */
    public function show(PaymentMethod $paymentMethod): JsonResponse
    {
        return $this->responseSuccess(null, new PaymentMethodResource($paymentMethod->load('status:id,code,label')));
    }

    /**
     * Mettre à jour une méthode de paiement
     *
     * @authenticated
     */
    public function update(UpdatePaymentMethodRequest $request, $id): JsonResponse
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->update([
            'code' => $request->code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('PaymentMethod updated Successfully', new PaymentMethodResource($paymentMethod->load('status:id,code,label')));
    }

    /**
     * Supprimer une méthode de paiement
     *
     * @authenticated
     */
    public function destroy(PaymentMethod $paymentMethod): JsonResponse
    {
        // $paymentMethod->delete();

        return $this->responseDeleted();
    }

   
}
