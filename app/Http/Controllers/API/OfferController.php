<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\UpdateOfferRequest;
use App\Http\Requests\Offer\CreateOfferRequest;
use App\Http\Resources\Offer\OfferResource;
use App\Models\Offer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OfferController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $offers = Offer::useFilters()->dynamicPaginate();

        return OfferResource::collection($offers);
    }

    public function store(CreateOfferRequest $request): JsonResponse
    {
        $offer = Offer::create($request->validated());

        return $this->responseCreated('Offer created successfully', new OfferResource($offer));
    }

    public function show(Offer $offer): JsonResponse
    {
        return $this->responseSuccess(null, new OfferResource($offer));
    }

    public function update(UpdateOfferRequest $request, Offer $offer): JsonResponse
    {
        $offer->update($request->validated());

        return $this->responseSuccess('Offer updated Successfully', new OfferResource($offer));
    }

    public function destroy(Offer $offer): JsonResponse
    {
        $offer->delete();

        return $this->responseDeleted();
    }

   
}
