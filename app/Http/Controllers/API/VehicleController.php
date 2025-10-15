<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Models\Vehicle;
use App\Enums\StatusEnum;
use App\Models\VehicleModel;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\Vehicle\VehicleResource;
use App\Http\Requests\Vehicle\CreateVehicleRequest;
use App\Http\Requests\Vehicle\UpdateVehicleRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des véhicules
 *
 * APIs pour la gestion des véhicules
 */
class VehicleController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les véhicules
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $vehicles = Vehicle::with('brand', 'vehicleModel', 'vehicleGenre', 'vehicleEnergy', 'color', 'bodywork')
                            ->latest('created_at')
                            ->useFilters()
                            ->dynamicPaginate();

        return VehicleResource::collection($vehicles);
    }

    /**
     * Ajouter un véhicule
     *
     * @authenticated
     */
    public function store(CreateVehicleRequest $request): JsonResponse
    {
        // $vehicle = Vehicle::create($request->validated());

        $license_plate = str_replace(' ', '', $request->license_plate);

        $exist = Vehicle::select("*")
            ->where('license_plate', 'like', $license_plate)
            ->count();  

        if($exist > 0){

            $vehicle = Vehicle::select("*")
                ->where('license_plate', 'like', $license_plate)
                ->first();  

            if($request->vehicle_mileage){
                $vehicle = Vehicle::where('id',$request->vehicle_id)->first();
                $vehicle->mileage = $request->vehicle_mileage;
                $vehicle->save();
            }

        } else {
            $vehicleModel = VehicleModel::where('id', $request->vehicle_model_id)->first();

            $vehicle = Vehicle::create([
                'brand_id' => $vehicleModel->brand_id ?? null,
                'vehicle_model_id' => $request->vehicle_model_id,
                'color_id' => $request->color_id,
                'license_plate' => strtoupper($license_plate),
                'bodywork_id' => $request->bodywork_id,
                'vehicle_genre_id' => $request->vehicle_genre_id,
                'vehicle_energy_id' => $request->vehicle_energy_id,
                'type' => $request->type,
                'option' => $request->option,
                'mileage' => $request->mileage ?? 0,
                'new_market_value' => $request->new_market_value ?? 0,
                'serial_number' => $request->serial_number,
                'technical_visit_date' => $request->technical_visit_date,
                'first_entry_into_circulation_date' => $request->first_entry_into_circulation_date,
                'fiscal_power' => $request->fiscal_power ?? 0,
                'payload' => $request->payload ?? 0,
                'nb_seats' => $request->nb_seats ?? 0,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('Vehicle created successfully', new VehicleResource($vehicle->load('brand', 'vehicleModel', 'color', 'bodywork')));
    }

    /**
     * Afficher un véhicule
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $vehicle = Vehicle::findOrFail(Vehicle::keyFromHashId($id));

        return $this->responseSuccess(null, new VehicleResource($vehicle->load('brand', 'vehicleModel', 'vehicleGenre', 'vehicleEnergy', 'color', 'bodywork')));
    }

    /**
     * Mettre à jour un véhicule
     *
     * @authenticated
     */
    public function update(UpdateVehicleRequest $request, $id): JsonResponse
    {
        $vehicle = Vehicle::findOrFail(Vehicle::keyFromHashId($id));
        $vehicleModel = VehicleModel::where('id', $request->vehicle_model_id)->first();
        $vehicle->update([
            'brand_id' => $vehicleModel->brand_id ?? null,
            'vehicle_model_id' => $request->vehicle_model_id ?? $vehicle->vehicle_model_id,
            'color_id' => $request->color_id ?? $vehicle->color_id,
            'license_plate' => strtoupper($request->license_plate) ?? $vehicle->license_plate,
            'bodywork_id' => $request->bodywork_id ?? $vehicle->bodywork_id,
            'vehicle_genre_id' => $request->vehicle_genre_id ?? $vehicle->vehicle_genre_id,
            'vehicle_energy_id' => $request->vehicle_energy_id ?? $vehicle->vehicle_energy_id,
            'new_market_value' => $request->new_market_value ?? $vehicle->new_market_value,
            'type' => $request->type ?? $vehicle->type,
            'option' => $request->option ?? $vehicle->option,
            'mileage' => $request->mileage ?? $vehicle->mileage,
            'serial_number' => $request->serial_number ?? $vehicle->serial_number,
            'technical_visit_date' => $request->technical_visit_date ?? $vehicle->technical_visit_date,
            'first_entry_into_circulation_date' => $request->first_entry_into_circulation_date ?? $vehicle->first_entry_into_circulation_date,
            'fiscal_power' => $request->fiscal_power ?? $vehicle->fiscal_power,
            'payload' => $request->payload ?? $vehicle->payload,
            'nb_seats' => $request->nb_seats ?? $vehicle->nb_seats,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Vehicle updated Successfully', new VehicleResource($vehicle));
    }

    /**
     * Supprimer un véhicule
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $vehicle = Vehicle::findOrFail(Vehicle::keyFromHashId($id));

        // $vehicle->delete();

        return $this->responseDeleted();
    }

   
}
