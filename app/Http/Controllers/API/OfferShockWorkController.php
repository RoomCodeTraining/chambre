<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferShockWork\UpdateOfferShockWorkRequest;
use App\Http\Requests\OfferShockWork\CreateOfferShockWorkRequest;
use App\Http\Resources\OfferShockWork\OfferShockWorkResource;
use App\Models\OfferShockWork;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OfferShockWorkController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $offerShockWorks = OfferShockWork::useFilters()->dynamicPaginate();

        return OfferShockWorkResource::collection($offerShockWorks);
    }

    public function store(CreateOfferShockWorkRequest $request): JsonResponse
    {
        $offerShockWork = OfferShockWork::create($request->validated());

        return $this->responseCreated('OfferShockWork created successfully', new OfferShockWorkResource($offerShockWork));
    }

    public function show(OfferShockWork $offerShockWork): JsonResponse
    {
        return $this->responseSuccess(null, new OfferShockWorkResource($offerShockWork));
    }

    public function update(UpdateOfferShockWorkRequest $request, OfferShockWork $offerShockWork): JsonResponse
    {
        $offerShockWork->update($request->validated());

        return $this->responseSuccess('OfferShockWork updated Successfully', new OfferShockWorkResource($offerShockWork));
    }

    public function destroy(OfferShockWork $offerShockWork): JsonResponse
    {
        $offerShockWork->delete();

        return $this->responseDeleted();
    }

   
}
