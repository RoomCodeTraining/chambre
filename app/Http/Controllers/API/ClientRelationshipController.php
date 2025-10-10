<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRelationship\UpdateClientRelationshipRequest;
use App\Http\Requests\ClientRelationship\CreateClientRelationshipRequest;
use App\Http\Resources\ClientRelationship\ClientRelationshipResource;
use App\Models\ClientRelationship;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ClientRelationshipController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $clientRelationships = ClientRelationship::useFilters()->dynamicPaginate();

        return ClientRelationshipResource::collection($clientRelationships);
    }

    public function store(CreateClientRelationshipRequest $request): JsonResponse
    {
        $clientRelationship = ClientRelationship::create($request->validated());

        return $this->responseCreated('ClientRelationship created successfully', new ClientRelationshipResource($clientRelationship));
    }

    public function show(ClientRelationship $clientRelationship): JsonResponse
    {
        return $this->responseSuccess(null, new ClientRelationshipResource($clientRelationship));
    }

    public function update(UpdateClientRelationshipRequest $request, ClientRelationship $clientRelationship): JsonResponse
    {
        $clientRelationship->update($request->validated());

        return $this->responseSuccess('ClientRelationship updated Successfully', new ClientRelationshipResource($clientRelationship));
    }

    public function destroy(ClientRelationship $clientRelationship): JsonResponse
    {
        $clientRelationship->delete();

        return $this->responseDeleted();
    }

   
}
