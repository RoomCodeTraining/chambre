<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\OtherCostType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\OtherCostType\OtherCostTypeResource;
use App\Http\Requests\OtherCostType\CreateOtherCostTypeRequest;
use App\Http\Requests\OtherCostType\UpdateOtherCostTypeRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des types d'autres charges
 *
 * APIs pour la gestion des types d'autres charges
 */
class OtherCostTypeController extends Controller
{
    use ApiResponse;
    
    public function __construct()
    {

    }

    /**
     * Lister tous les types d'autres charges
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $otherCostTypes = OtherCostType::latest('updated_at')
                        ->useFilters()
                        ->dynamicPaginate();

        return OtherCostTypeResource::collection($otherCostTypes);
    }

    /**
     * Ajouter un type d'autre charge
     *
     * @authenticated
     */
    public function store(CreateOtherCostTypeRequest $request): JsonResponse
    {
        $exist = OtherCostType::select("*")
            ->where('label', $request->label)
            ->count();  

        if($exist > 0){
            $otherCostType = OtherCostType::select("*")
                ->where('label', $request->label)
                ->first();  

            $otherCostType->update([
                'updated_at' => now()
            ]);
        } else{
            $code = strtolower(str_replace(' ', '', $request->label));

            $otherCostType = OtherCostType::create([
                'code' => $code,
                'label' => $request->label,
                'description' => $request->description,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('OtherCostType created successfully', new OtherCostTypeResource($otherCostType));
    }

    /**
     * Afficher un type d'autre charge
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $otherCostType = OtherCostType::findOrFail(OtherCostType::keyFromHashId($id));

        return $this->responseSuccess(null, new OtherCostTypeResource($otherCostType));
    }

    /**
     * Mettre à jour un type d'autre charge
     *
     * @authenticated
     */
    public function update(UpdateOtherCostTypeRequest $request, $id): JsonResponse
    {
        $otherCostType = OtherCostType::findOrFail(OtherCostType::keyFromHashId($id));
        $otherCostType->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('OtherCostType updated Successfully', new OtherCostTypeResource($otherCostType));
    }

    /**
     * Supprimer un type d'autre charge
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $otherCostType = OtherCostType::findOrFail(OtherCostType::keyFromHashId($id));

        $otherCostType->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_at' => now(),
            'deleted_by' => auth()->user()->id,
        ]);

        // $otherCostType->delete();

        return $this->responseDeleted();
    }

   
}
