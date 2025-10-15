<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRelationship\UpdateVehicleRelationshipRequest;
use App\Http\Requests\VehicleRelationship\CreateVehicleRelationshipRequest;
use App\Http\Resources\VehicleRelationship\VehicleRelationshipResource;
use App\Models\VehicleRelationship;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VehicleRelationshipController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $vehicleRelationships = VehicleRelationship::useFilters()->dynamicPaginate();

        return VehicleRelationshipResource::collection($vehicleRelationships);
    }

    public function store(CreateVehicleRelationshipRequest $request): JsonResponse
    {
        $vehicleRelationship = VehicleRelationship::create($request->validated());

        return $this->responseCreated('VehicleRelationship created successfully', new VehicleRelationshipResource($vehicleRelationship));
    }

    public function show($id): JsonResponse
    {
        $vehicleRelationship = VehicleRelationship::findOrFail(VehicleRelationship::keyFromHashId($id));

        return $this->responseSuccess(null, new VehicleRelationshipResource($vehicleRelationship));
    }

    public function update(UpdateVehicleRelationshipRequest $request, $id): JsonResponse
    {
        $vehicleRelationship = VehicleRelationship::findOrFail(VehicleRelationship::keyFromHashId($id));

        $vehicleRelationship->update($request->validated());

        return $this->responseSuccess(null, new VehicleRelationshipResource($vehicleRelationship));
    }

    public function destroy($id): JsonResponse
    {
        $vehicleRelationship = VehicleRelationship::findOrFail(VehicleRelationship::keyFromHashId($id));

        // $vehicleRelationship->delete();

        return $this->responseDeleted();
    }

   
}
