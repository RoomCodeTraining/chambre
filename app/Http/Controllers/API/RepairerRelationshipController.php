<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepairerRelationship\UpdateRepairerRelationshipRequest;
use App\Http\Requests\RepairerRelationship\CreateRepairerRelationshipRequest;
use App\Http\Resources\RepairerRelationship\RepairerRelationshipResource;
use App\Models\RepairerRelationship;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RepairerRelationshipController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $repairerRelationships = RepairerRelationship::useFilters()->dynamicPaginate();

        return RepairerRelationshipResource::collection($repairerRelationships);
    }

    public function store(CreateRepairerRelationshipRequest $request): JsonResponse
    {
        $repairerRelationship = RepairerRelationship::create($request->validated());

        return $this->responseCreated('RepairerRelationship created successfully', new RepairerRelationshipResource($repairerRelationship));
    }

    public function show(RepairerRelationship $repairerRelationship): JsonResponse
    {
        return $this->responseSuccess(null, new RepairerRelationshipResource($repairerRelationship));
    }

    public function update(UpdateRepairerRelationshipRequest $request, RepairerRelationship $repairerRelationship): JsonResponse
    {
        $repairerRelationship->update($request->validated());

        return $this->responseSuccess('RepairerRelationship updated Successfully', new RepairerRelationshipResource($repairerRelationship));
    }

    public function destroy(RepairerRelationship $repairerRelationship): JsonResponse
    {
        $repairerRelationship->delete();

        return $this->responseDeleted();
    }

   
}
