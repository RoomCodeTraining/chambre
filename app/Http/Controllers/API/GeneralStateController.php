<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\GeneralState;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\GeneralState\GeneralStateResource;
use App\Http\Requests\GeneralState\CreateGeneralStateRequest;
use App\Http\Requests\GeneralState\UpdateGeneralStateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des états généraux
 *
 * APIs pour la gestion des états généraux
 */
class GeneralStateController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les états généraux
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $generalStates = GeneralState::useFilters()->dynamicPaginate();

        return GeneralStateResource::collection($generalStates);
    }

    /**
     * Ajouter un état général
     *
     * @authenticated
     */
    public function store(CreateGeneralStateRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $generalState = GeneralState::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('GeneralState created successfully', new GeneralStateResource($generalState));
    }

    /**
     * Afficher un état général
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $generalState = GeneralState::findOrFail($id);

        return $this->responseSuccess(null, new GeneralStateResource($generalState));
    }

    /**
     * Mettre à jour un état général
     *
     * @authenticated
     */
    public function update(UpdateGeneralStateRequest $request, $id): JsonResponse
    {
        $generalState = GeneralState::findOrFail($id);

        $generalState->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('GeneralState updated Successfully', new GeneralStateResource($generalState));
    }

    /**
     * Supprimer un état général
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $generalState = GeneralState::findOrFail($id);

        // $generalState->delete();

        return $this->responseDeleted();
    }

   
}
