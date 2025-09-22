<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\AssignmentType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssignmentType\AssignmentTypeResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\AssignmentType\CreateAssignmentTypeRequest;
use App\Http\Requests\AssignmentType\UpdateAssignmentTypeRequest;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des types de dossiers
 *
 * APIs pour la gestion des types de dossiers
 */
class AssignmentTypeController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les types de dossiers
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $assignmentTypes = AssignmentType::useFilters()->dynamicPaginate();

        return AssignmentTypeResource::collection($assignmentTypes);
    }

    /**
     * Ajouter un type de dossier
     *
     * @authenticated
     */
    public function store(CreateAssignmentTypeRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $assignmentType = AssignmentType::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('AssignmentType created successfully', new AssignmentTypeResource($assignmentType));
    }

    /**
     * Afficher un type de dossier
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $assignmentType = AssignmentType::findOrFail($id);

        return $this->responseSuccess(null, new AssignmentTypeResource($assignmentType));
    }

    /**
     * Mettre à jour un type de dossier
     *
     * @authenticated
     */
    public function update(UpdateAssignmentTypeRequest $request, $id): JsonResponse
    {
        $assignmentType = AssignmentType::findOrFail($id);

        $assignmentType->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('AssignmentType updated Successfully', new AssignmentTypeResource($assignmentType));
    }

    /**
     * Supprimer un type de dossier
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $assignmentType = AssignmentType::findOrFail($id);

        // $assignmentType->delete();

        return $this->responseDeleted();
    }

   
}
