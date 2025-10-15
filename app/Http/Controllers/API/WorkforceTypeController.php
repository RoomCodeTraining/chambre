<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\WorkforceType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\WorkforceType\WorkforceTypeResource;
use App\Http\Requests\WorkforceType\CreateWorkforceTypeRequest;
use App\Http\Requests\WorkforceType\UpdateWorkforceTypeRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des types de main-d'œuvre
 *
 * APIs pour la gestion des types de main-d'œuvre
 */
class WorkforceTypeController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les types de main-d'œuvre
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $workforceTypes = WorkforceType::with('status')->latest('updated_at')->useFilters()->dynamicPaginate();

        return WorkforceTypeResource::collection($workforceTypes);
    }

    /**
     * Créer un type de main-d'œuvre
     *
     * @authenticated
     */
    public function store(CreateWorkforceTypeRequest $request): JsonResponse
    {
        $exist = WorkforceType::select("*")
            ->where('label', $request->label)
            ->count();  

        if($exist > 0){
            $workforceType = WorkforceType::select("*")
                ->where('label', $request->label)
                ->first();  

            $workforceType->update([
                'updated_at' => now()
            ]);
        } else{
            $code = strtolower(str_replace(' ', '', $request->label));

            if(WorkforceType::where('code', $code)->exists()){
                $code = $code . '-' . now()->timestamp;
            }

            $workforceType = WorkforceType::create([
                'code' => $code,
                'label' => $request->label,
                'description' => $request->description,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('WorkforceType created successfully', new WorkforceTypeResource($workforceType));
    }

    /**
     * Afficher un type de main-d'œuvre
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $workforceType = WorkforceType::findOrFail(WorkforceType::keyFromHashId($id));

        return $this->responseSuccess(null, new WorkforceTypeResource($workforceType));
    }

    /**
     * Mettre à jour un type de main-d'œuvre
     *
     * @authenticated
     */
    public function update(UpdateWorkforceTypeRequest $request, $id): JsonResponse
    {
        $workforceType = WorkforceType::findOrFail(WorkforceType::keyFromHashId($id));
        $workforceType->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('WorkforceType updated Successfully', new WorkforceTypeResource($workforceType));
    }

    /**
     * Supprimer un type de main-d'œuvre
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $workforceType = WorkforceType::findOrFail(WorkforceType::keyFromHashId($id));

        // $workforceType->delete();

        return $this->responseDeleted();
    }

   
}
