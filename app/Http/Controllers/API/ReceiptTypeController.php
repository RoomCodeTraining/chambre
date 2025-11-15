<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\ReceiptType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReceiptType\ReceiptTypeResource;
use App\Http\Requests\ReceiptType\CreateReceiptTypeRequest;
use App\Http\Requests\ReceiptType\UpdateReceiptTypeRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des types de quittances
 *
 * APIs pour la gestion des types de quittances
 */
class ReceiptTypeController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les types de quittances
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $receiptTypes = ReceiptType::useFilters()->dynamicPaginate();

        return ReceiptTypeResource::collection($receiptTypes);
    }

    /**
     * Ajouter un type de quittance
     *
     * @authenticated
     */
    public function store(CreateReceiptTypeRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $receiptType = ReceiptType::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('ReceiptType created successfully', new ReceiptTypeResource($receiptType));
    }

    /**
     * Afficher un type de quittance
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $receiptType = ReceiptType::findOrFail(ReceiptType::keyFromHashId($id));

        return $this->responseSuccess(null, new ReceiptTypeResource($receiptType));
    }

    /**
     * Mettre à jour un type de quittance
     *
     * @authenticated
     */
    public function update(UpdateReceiptTypeRequest $request, $id): JsonResponse
    {
        $receiptType = ReceiptType::findOrFail(ReceiptType::keyFromHashId($id));
        $receiptType->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('ReceiptType updated Successfully', new ReceiptTypeResource($receiptType));
    }

    /**
     * Activer un type de quittance
     *
     * @authenticated
     */
    public function enable($id): JsonResponse
    {
        $receiptType = ReceiptType::findOrFail(ReceiptType::keyFromHashId($id));

        $receiptType->update([
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('ReceiptType enabled successfully', new ReceiptTypeResource($receiptType));
    }

    /**
     * Désactiver un type de quittance
     *
     * @authenticated
     */
    public function disable($id): JsonResponse
    {
        $receiptType = ReceiptType::findOrFail(ReceiptType::keyFromHashId($id));

        $receiptType->update([
            'status_id' => Status::firstWhere('code', StatusEnum::INACTIVE)->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('ReceiptType disabled successfully', new ReceiptTypeResource($receiptType));
    }

    /**
     * Supprimer un type de quittance
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $receiptType = ReceiptType::findOrFail(ReceiptType::keyFromHashId($id));

        // $receiptType->delete();

        return $this->responseDeleted();
    }

   
}
