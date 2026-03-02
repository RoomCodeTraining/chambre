<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comparison\UpdateComparisonRequest;
use App\Http\Requests\Comparison\CreateComparisonRequest;
use App\Http\Resources\Comparison\ComparisonResource;
use App\Models\Comparison;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ComparisonController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $comparisons = Comparison::useFilters()->dynamicPaginate();

        return ComparisonResource::collection($comparisons);
    }

    public function store(CreateComparisonRequest $request): JsonResponse
    {
        $comparison = Comparison::create($request->validated());

        return $this->responseCreated('Comparison created successfully', new ComparisonResource($comparison));
    }

    public function show(Comparison $comparison): JsonResponse
    {
        return $this->responseSuccess(null, new ComparisonResource($comparison));
    }

    public function update(UpdateComparisonRequest $request, Comparison $comparison): JsonResponse
    {
        $comparison->update($request->validated());

        return $this->responseSuccess('Comparison updated Successfully', new ComparisonResource($comparison));
    }

    public function destroy(Comparison $comparison): JsonResponse
    {
        $comparison->delete();

        return $this->responseDeleted();
    }

   
}
