<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quote\UpdateQuoteRequest;
use App\Http\Requests\Quote\CreateQuoteRequest;
use App\Http\Resources\Quote\QuoteResource;
use App\Models\Quote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuoteController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $quotes = Quote::useFilters()->dynamicPaginate();

        return QuoteResource::collection($quotes);
    }

    public function store(CreateQuoteRequest $request): JsonResponse
    {
        $quote = Quote::create($request->validated());

        return $this->responseCreated('Quote created successfully', new QuoteResource($quote));
    }

    public function show(Quote $quote): JsonResponse
    {
        return $this->responseSuccess(null, new QuoteResource($quote));
    }

    public function update(UpdateQuoteRequest $request, Quote $quote): JsonResponse
    {
        $quote->update($request->validated());

        return $this->responseSuccess('Quote updated Successfully', new QuoteResource($quote));
    }

    public function destroy(Quote $quote): JsonResponse
    {
        $quote->delete();

        return $this->responseDeleted();
    }

   
}
