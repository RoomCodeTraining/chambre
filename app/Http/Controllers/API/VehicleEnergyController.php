<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Enums\StatusEnum;
use App\Http\Requests\VehicleEnergy\UpdateVehicleEnergyRequest;
use App\Http\Requests\VehicleEnergy\CreateVehicleEnergyRequest;
use App\Http\Resources\VehicleEnergy\VehicleEnergyResource;
use App\Models\Status;
use App\Models\VehicleEnergy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des énergies des véhicules
 *
 * APIs pour la gestion des énergies des véhicules
 */
class VehicleEnergyController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les énergies des véhicules
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $vehicleEnergies = VehicleEnergy::with('status')->latest('created_at')->useFilters()->dynamicPaginate();

        return VehicleEnergyResource::collection($vehicleEnergies);
    }

    /**
     * Créer une nouvelle énergie de véhicule
     *
     * @authenticated
     */
    public function store(CreateVehicleEnergyRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));
        $vehicleEnergy = VehicleEnergy::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('VehicleEnergy created successfully', new VehicleEnergyResource($vehicleEnergy));
    }

    /**
     * Afficher une énergie de véhicule
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $vehicleEnergy = VehicleEnergy::findOrFail(VehicleEnergy::keyFromHashId($id));

        return $this->responseSuccess(null, new VehicleEnergyResource($vehicleEnergy));
    }

    /**
     * Mettre à jour une énergie de véhicule
     *
     * @authenticated
     */
    public function update(UpdateVehicleEnergyRequest $request, $id): JsonResponse
    {
        $vehicleEnergy = VehicleEnergy::findOrFail(VehicleEnergy::keyFromHashId($id));
        $vehicleEnergy->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('VehicleEnergy updated Successfully', new VehicleEnergyResource($vehicleEnergy));
    }

    /**
     * Supprimer une énergie de véhicule
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $vehicleEnergy = VehicleEnergy::findOrFail(VehicleEnergy::keyFromHashId($id));

        // $vehicleEnergy->delete();

        return $this->responseDeleted();
    }

   
}
