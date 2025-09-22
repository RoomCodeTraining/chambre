<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\VehicleGenre;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\VehicleGenre\VehicleGenreResource;
use App\Http\Requests\VehicleGenre\CreateVehicleGenreRequest;
use App\Http\Requests\VehicleGenre\UpdateVehicleGenreRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des genres de véhicules
 *
 * APIs pour la gestion des genres de véhicules
 */
class VehicleGenreController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les genres de véhicules
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $vehicleGenres = VehicleGenre::with('status')->latest('created_at')->useFilters()->dynamicPaginate();

        return VehicleGenreResource::collection($vehicleGenres);
    }

    /**
     * Créer un nouveau genre de véhicule
     *
     * @authenticated
     */
    public function store(CreateVehicleGenreRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $vehicleGenre = VehicleGenre::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'max_mileage_essence_per_year' => $request->max_mileage_essence_per_year ?? 0,
            'max_mileage_diesel_per_year' => $request->max_mileage_diesel_per_year ?? 0,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('VehicleGenre created successfully', new VehicleGenreResource($vehicleGenre));
    }

    /**
     * Afficher un genre de véhicule
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $vehicleGenre = VehicleGenre::findOrFail($id);

        return $this->responseSuccess(null, new VehicleGenreResource($vehicleGenre));
    }

    /**
     * Mettre à jour un genre de véhicule
     *
     * @authenticated
     */
    public function update(UpdateVehicleGenreRequest $request, $id): JsonResponse
    {
        $vehicleGenre = VehicleGenre::findOrFail($id);
        $vehicleGenre->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('VehicleGenre updated Successfully', new VehicleGenreResource($vehicleGenre));
    }

    /**
     * Supprimer un genre de véhicule
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $vehicleGenre = VehicleGenre::findOrFail($id);
        // $vehicleGenre->delete();

        return $this->responseDeleted();
    }

   
}
