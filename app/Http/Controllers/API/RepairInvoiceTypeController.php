<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepairInvoiceType\UpdateRepairInvoiceTypeRequest;
use App\Http\Requests\RepairInvoiceType\CreateRepairInvoiceTypeRequest;
use App\Http\Resources\RepairInvoiceType\RepairInvoiceTypeResource;
use App\Models\RepairInvoiceType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RepairInvoiceTypeController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $repairInvoiceTypes = RepairInvoiceType::useFilters()->dynamicPaginate();

        return RepairInvoiceTypeResource::collection($repairInvoiceTypes);
    }

    public function store(CreateRepairInvoiceTypeRequest $request): JsonResponse
    {
        $repairInvoiceType = RepairInvoiceType::create($request->validated());

        return $this->responseCreated('RepairInvoiceType created successfully', new RepairInvoiceTypeResource($repairInvoiceType));
    }

    public function show(RepairInvoiceType $repairInvoiceType): JsonResponse
    {
        return $this->responseSuccess(null, new RepairInvoiceTypeResource($repairInvoiceType));
    }

    public function update(UpdateRepairInvoiceTypeRequest $request, RepairInvoiceType $repairInvoiceType): JsonResponse
    {
        $repairInvoiceType->update($request->validated());

        return $this->responseSuccess('RepairInvoiceType updated Successfully', new RepairInvoiceTypeResource($repairInvoiceType));
    }

    public function destroy(RepairInvoiceType $repairInvoiceType): JsonResponse
    {
        $repairInvoiceType->delete();

        return $this->responseDeleted();
    }

   
}
