<?php

namespace App\Http\Controllers\API;

use App\Models\Brand;
use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\VehicleModel\VehicleModelResource;
use App\Http\Requests\VehicleModel\CreateVehicleModelRequest;
use App\Http\Requests\VehicleModel\UpdateVehicleModelRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des modèles de véhicules
 *
 * APIs pour la gestion des modèles de véhicules
 */
class VehicleModelController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les modèles de véhicules
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $vehicleModels = VehicleModel::with(['brand', 'status']);

        if(request()->has('brand_id')){
            $vehicleModels = $vehicleModels->where('brand_id', Brand::keyFromHashId(request()->brand_id));
        }

        $vehicleModels = $vehicleModels->useFilters()
                    ->latest('created_at')
                    ->dynamicPaginate();

        return VehicleModelResource::collection($vehicleModels);
    }

    /**
     * Créer un modèle de véhicule
     *
     * @authenticated
     */
    public function store(CreateVehicleModelRequest $request): JsonResponse
    {
        $exist = VehicleModel::select("*")
            ->where('label', $request->label)
            ->where('brand_id', $request->brand_id)
            ->count();  

        if($exist > 0){

            $vehicleModel = VehicleModel::select("*")
                ->where('label', $request->label)
                ->where('brand_id', $request->brand_id)
                ->first();  

        } else{
            $code = strtolower(str_replace(' ', '', $request->label));

            if(VehicleModel::where('code', $code)->exists()){
                $code = $code . '-' . now()->timestamp;
            }

            $vehicleModel = VehicleModel::create([
                'code' => $code,
                'label' => $request->label,
                'description' => $request->description,
                'brand_id' => $request->brand_id,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('VehicleModel created successfully', new VehicleModelResource($vehicleModel));
    }

    /**
     * Afficher un modèle de véhicule
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $vehicleModel = VehicleModel::findOrFail(VehicleModel::keyFromHashId($id));

        return $this->responseSuccess(null, new VehicleModelResource($vehicleModel));
    }

    /**
     * Mettre à jour un modèle de véhicule
     *
     * @authenticated
     */
    public function update(UpdateVehicleModelRequest $request, $id): JsonResponse
    {
        $vehicleModel = VehicleModel::findOrFail(VehicleModel::keyFromHashId($id));
        $vehicleModel->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('VehicleModel updated Successfully', new VehicleModelResource($vehicleModel));
    }

    /**
     * Supprimer un modèle de véhicule
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $vehicleModel = VehicleModel::findOrFail(VehicleModel::keyFromHashId($id));

        // $vehicleModel->delete();

        return $this->responseDeleted();
    }

   
}
