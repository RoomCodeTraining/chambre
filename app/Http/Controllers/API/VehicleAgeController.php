<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\VehicleAge;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\VehicleAge\VehicleAgeResource;
use App\Http\Requests\VehicleAge\CreateVehicleAgeRequest;
use App\Http\Requests\VehicleAge\UpdateVehicleAgeRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des âges des véhicules
 *
 * APIs pour la gestion des âges des véhicules
 */
class VehicleAgeController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les âges des véhicules
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $vehicleAges = VehicleAge::with('status')->latest('created_at')->useFilters()->dynamicPaginate();

        return VehicleAgeResource::collection($vehicleAges);
    }

    /**
     * Créer un nouvel âge de véhicule
     *
     * @authenticated
     */
    public function store(CreateVehicleAgeRequest $request): JsonResponse
    {
        $vehicleAge = VehicleAge::create([
            'value' => $request->value,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('VehicleAge created successfully', new VehicleAgeResource($vehicleAge));
    }

    /**
     * Afficher un âge de véhicule
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $vehicleAge = VehicleAge::findOrFail(VehicleAge::keyFromHashId($id));

        return $this->responseSuccess(null, new VehicleAgeResource($vehicleAge));
    }

    /**
     * Mettre à jour un âge de véhicule
     *
     * @authenticated
     */
    public function update(UpdateVehicleAgeRequest $request, $id): JsonResponse
    {
        $vehicleAge = VehicleAge::findOrFail(VehicleAge::keyFromHashId($id));

        $vehicleAge->update([
            'value' => $request->value,
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('VehicleAge updated Successfully', new VehicleAgeResource($vehicleAge));
    }

    /**
     * Supprimer un âge de véhicule
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $vehicleAge = VehicleAge::findOrFail(VehicleAge::keyFromHashId($id));

        // $vehicleAge->delete();

        return $this->responseDeleted();
    }

   
}
