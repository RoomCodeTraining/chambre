<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\AscertainmentType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\AscertainmentType\AscertainmentTypeResource;
use App\Http\Requests\AscertainmentType\CreateAscertainmentTypeRequest;
use App\Http\Requests\AscertainmentType\UpdateAscertainmentTypeRequest;

/**
 * @group Gestion des types de constat
 *
 * APIs pour la gestion des types de constat
 */
class AscertainmentTypeController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister les types de constat
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $ascertainmentTypes = AscertainmentType::with('status:id,code,label')
            ->useFilters()
            ->dynamicPaginate();

        return AscertainmentTypeResource::collection($ascertainmentTypes);
    }

    /**
     * Créer un type de constat
     *
     * @authenticated
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateAscertainmentTypeRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $ascertainmentType = AscertainmentType::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('AscertainmentType created successfully', new AscertainmentTypeResource($ascertainmentType));
    }

    /**
     * Afficher un type de constat
     *
     * @authenticated
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        $ascertainmentType = AscertainmentType::findOrFail(AscertainmentType::keyFromHashId($id));

        return $this->responseSuccess(null, new AscertainmentTypeResource($ascertainmentType));
    }

    /**
     * Mettre à jour un type de constat
     *
     * @param \App\Http\Requests\AscertainmentType\UpdateAscertainmentTypeRequest $request
     * @authenticated
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateAscertainmentTypeRequest $request, $id): JsonResponse
    {
        $ascertainmentType = AscertainmentType::findOrFail(AscertainmentType::keyFromHashId($id));

        $ascertainmentType->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('AscertainmentType updated Successfully', new AscertainmentTypeResource($ascertainmentType));
    }

    /**
     * Supprimer un type de constat
     *
     * @authenticated
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $ascertainmentType = AscertainmentType::findOrFail(AscertainmentType::keyFromHashId($id));
        // $ascertainmentType->delete();

        return $this->responseDeleted();
    }

   
}
