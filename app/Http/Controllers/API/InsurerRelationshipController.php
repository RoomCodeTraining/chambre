<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsurerRelationship\UpdateInsurerRelationshipRequest;
use App\Http\Requests\InsurerRelationship\CreateInsurerRelationshipRequest;
use App\Http\Resources\InsurerRelationship\InsurerRelationshipResource;
use App\Models\InsurerRelationship;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class InsurerRelationshipController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $insurerRelationships = InsurerRelationship::useFilters()->dynamicPaginate();

        return InsurerRelationshipResource::collection($insurerRelationships);
    }

    public function store(CreateInsurerRelationshipRequest $request): JsonResponse
    {
        $insurerRelationship = InsurerRelationship::create($request->validated());

        return $this->responseCreated('InsurerRelationship created successfully', new InsurerRelationshipResource($insurerRelationship));
    }

    public function show(InsurerRelationship $insurerRelationship): JsonResponse
    {
        return $this->responseSuccess(null, new InsurerRelationshipResource($insurerRelationship));
    }

    public function update(UpdateInsurerRelationshipRequest $request, InsurerRelationship $insurerRelationship): JsonResponse
    {
        $insurerRelationship->update($request->validated());

        return $this->responseSuccess('InsurerRelationship updated Successfully', new InsurerRelationshipResource($insurerRelationship));
    }

    public function destroy(InsurerRelationship $insurerRelationship): JsonResponse
    {
        $insurerRelationship->delete();

        return $this->responseDeleted();
    }

   
}
