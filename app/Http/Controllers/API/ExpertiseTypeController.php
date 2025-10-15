<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\ExpertiseType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExpertiseType\ExpertiseTypeResource;
use App\Http\Requests\ExpertiseType\CreateExpertiseTypeRequest;
use App\Http\Requests\ExpertiseType\UpdateExpertiseTypeRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des types d'expertise
 *
 * APIs pour la gestion des types d'expertise
 */
class ExpertiseTypeController extends Controller
{
    use ApiResponse;
    
    public function __construct()
    {

    }

    /**
     * Lister tous les types d'expertise
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $expertiseTypes = ExpertiseType::useFilters()->dynamicPaginate();

        return ExpertiseTypeResource::collection($expertiseTypes);
    }

    /**
     * Ajouter un type d'expertise
     *
     * @authenticated
     */
    public function store(CreateExpertiseTypeRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $expertiseType = ExpertiseType::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('ExpertiseType created successfully', new ExpertiseTypeResource($expertiseType));
    }

    /**
     * Afficher un type d'expertise
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $expertiseType = ExpertiseType::findOrFail(ExpertiseType::keyFromHashId($id));

        return $this->responseSuccess(null, new ExpertiseTypeResource($expertiseType));
    }

    /**
     * Mettre à jour un type d'expertise
     *
     * @authenticated
     */
    public function update(UpdateExpertiseTypeRequest $request, $id): JsonResponse
    {
        $expertiseType = ExpertiseType::findOrFail(ExpertiseType::keyFromHashId($id));

        $expertiseType->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('ExpertiseType updated Successfully', new ExpertiseTypeResource($expertiseType));
    }

    /**
     * Supprimer un type d'expertise
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $expertiseType = ExpertiseType::findOrFail(ExpertiseType::keyFromHashId($id));

        // $expertiseType->delete();

        return $this->responseDeleted();
    }

   
}
