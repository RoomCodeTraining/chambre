<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferShock\UpdateOfferShockRequest;
use App\Http\Requests\OfferShock\CreateOfferShockRequest;
use App\Http\Resources\OfferShock\OfferShockResource;
use App\Models\OfferShock;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OfferShockController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $offerShocks = OfferShock::useFilters()->dynamicPaginate();

        return OfferShockResource::collection($offerShocks);
    }

    public function store(CreateOfferShockRequest $request): JsonResponse
    {
        $offerShock = OfferShock::create($request->validated());

        return $this->responseCreated('OfferShock created successfully', new OfferShockResource($offerShock));
    }

    public function show(OfferShock $offerShock): JsonResponse
    {
        return $this->responseSuccess(null, new OfferShockResource($offerShock));
    }

    public function update(UpdateOfferShockRequest $request, OfferShock $offerShock): JsonResponse
    {
        $offerShock->update($request->validated());

        return $this->responseSuccess('OfferShock updated Successfully', new OfferShockResource($offerShock));
    }

    public function destroy(OfferShock $offerShock): JsonResponse
    {
        $offerShock->delete();

        return $this->responseDeleted();
    }

   
}
