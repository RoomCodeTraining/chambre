<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Models\TechnicalConclusion;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\TechnicalConclusion\TechnicalConclusionResource;
use App\Http\Requests\TechnicalConclusion\CreateTechnicalConclusionRequest;
use App\Http\Requests\TechnicalConclusion\UpdateTechnicalConclusionRequest;

/**
 * @group Gestion des conclusions techniques
 *
 * APIs pour la gestion des conclusions techniques
 */
class TechnicalConclusionController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les conclusions techniques
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $technicalConclusions = TechnicalConclusion::useFilters()->dynamicPaginate();

        return TechnicalConclusionResource::collection($technicalConclusions);
    }

    /**
     * Ajouter une conclusion technique
     *
     * @authenticated
     */
    public function store(CreateTechnicalConclusionRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $technicalConclusion = TechnicalConclusion::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('TechnicalConclusion created successfully', new TechnicalConclusionResource($technicalConclusion));
    }

    /**
     * Afficher une conclusion technique
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $technicalConclusion = TechnicalConclusion::findOrFail($id);

        return $this->responseSuccess(null, new TechnicalConclusionResource($technicalConclusion));
    }

    /**
     * Mettre à jour une conclusion technique
     *
     * @authenticated
     */
    public function update(UpdateTechnicalConclusionRequest $request, $id): JsonResponse
    {
        $technicalConclusion = TechnicalConclusion::findOrFail($id);
        $technicalConclusion->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('TechnicalConclusion updated Successfully', new TechnicalConclusionResource($technicalConclusion));
    }

    /**
     * Supprimer une conclusion technique
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $technicalConclusion = TechnicalConclusion::findOrFail($id);

        // $technicalConclusion->delete();

        return $this->responseDeleted();
    }

   
}
