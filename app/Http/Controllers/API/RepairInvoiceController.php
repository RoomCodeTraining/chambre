<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepairInvoice\UpdateRepairInvoiceRequest;
use App\Http\Requests\RepairInvoice\CreateRepairInvoiceRequest;
use App\Http\Resources\RepairInvoice\RepairInvoiceResource;
use App\Models\RepairInvoice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RepairInvoiceController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $repairInvoices = RepairInvoice::useFilters()->dynamicPaginate();

        return RepairInvoiceResource::collection($repairInvoices);
    }

    public function store(CreateRepairInvoiceRequest $request): JsonResponse
    {
        $repairInvoice = RepairInvoice::create($request->validated());

        return $this->responseCreated('RepairInvoice created successfully', new RepairInvoiceResource($repairInvoice));
    }

    public function show(RepairInvoice $repairInvoice): JsonResponse
    {
        return $this->responseSuccess(null, new RepairInvoiceResource($repairInvoice));
    }

    public function update(UpdateRepairInvoiceRequest $request, RepairInvoice $repairInvoice): JsonResponse
    {
        $repairInvoice->update($request->validated());

        return $this->responseSuccess('RepairInvoice updated Successfully', new RepairInvoiceResource($repairInvoice));
    }

    public function destroy(RepairInvoice $repairInvoice): JsonResponse
    {
        $repairInvoice->delete();

        return $this->responseDeleted();
    }

   
}
