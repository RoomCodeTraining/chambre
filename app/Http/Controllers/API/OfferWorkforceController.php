<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferWorkforce\UpdateOfferWorkforceRequest;
use App\Http\Requests\OfferWorkforce\CreateOfferWorkforceRequest;
use App\Http\Resources\OfferWorkforce\OfferWorkforceResource;
use App\Models\OfferWorkforce;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OfferWorkforceController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $offerWorkforces = OfferWorkforce::useFilters()->dynamicPaginate();

        return OfferWorkforceResource::collection($offerWorkforces);
    }

    public function store(CreateOfferWorkforceRequest $request): JsonResponse
    {
        $offerWorkforce = OfferWorkforce::create($request->validated());

        return $this->responseCreated('OfferWorkforce created successfully', new OfferWorkforceResource($offerWorkforce));
    }

    public function show(OfferWorkforce $offerWorkforce): JsonResponse
    {
        return $this->responseSuccess(null, new OfferWorkforceResource($offerWorkforce));
    }

    public function update(UpdateOfferWorkforceRequest $request, OfferWorkforce $offerWorkforce): JsonResponse
    {
        $offerWorkforce->update($request->validated());

        return $this->responseSuccess('OfferWorkforce updated Successfully', new OfferWorkforceResource($offerWorkforce));
    }

    public function destroy(OfferWorkforce $offerWorkforce): JsonResponse
    {
        $offerWorkforce->delete();

        return $this->responseDeleted();
    }

   
}
