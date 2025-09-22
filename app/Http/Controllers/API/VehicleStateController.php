<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\VehicleState;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\VehicleState\VehicleStateResource;
use App\Http\Requests\VehicleState\CreateVehicleStateRequest;
use App\Http\Requests\VehicleState\UpdateVehicleStateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des états de véhicules
 *
 * APIs pour la gestion des états de véhicules
 */
class VehicleStateController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les états de véhicules
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $vehicleStates = VehicleState::with('status')->latest('created_at')->useFilters()->dynamicPaginate();

        return VehicleStateResource::collection($vehicleStates);
    }

    /**
     * Créer un état de véhicule
     *
     * @authenticated
     */
    public function store(CreateVehicleStateRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $vehicleState = VehicleState::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('VehicleState created successfully', new VehicleStateResource($vehicleState));
    }

    /**
     * Afficher un état de véhicule
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $vehicleState = VehicleState::findOrFail($id);

        return $this->responseSuccess(null, new VehicleStateResource($vehicleState));
    }

    /**
     * Mettre à jour un état de véhicule
     *
     * @authenticated
     */
    public function update(UpdateVehicleStateRequest $request, $id): JsonResponse
    {
        $vehicleState = VehicleState::findOrFail($id);
        $vehicleState->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('VehicleState updated Successfully', new VehicleStateResource($vehicleState));
    }

    /**
     * Supprimer un état de véhicule
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $vehicleState = VehicleState::findOrFail($id);

        // $vehicleState->delete();

        return $this->responseDeleted();
    }

   
}
