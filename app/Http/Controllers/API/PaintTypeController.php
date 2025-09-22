<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaintType\UpdatePaintTypeRequest;
use App\Http\Requests\PaintType\CreatePaintTypeRequest;
use App\Http\Resources\PaintType\PaintTypeResource;
use App\Models\PaintType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Enums\StatusEnum;
use App\Models\Status;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des types de peinture
 *
 * APIs pour la gestion des types de peinture
 */
class PaintTypeController extends Controller
{
    use ApiResponse;
    
    public function __construct()
    {

    }

    /**
     * Lister tous les types de peinture
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $paintTypes = PaintType::useFilters()->dynamicPaginate();

        return PaintTypeResource::collection($paintTypes);
    }

    /**
     * Ajouter un type de peinture
     *
     * @authenticated
     */
    public function store(CreatePaintTypeRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $paintType = PaintType::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('PaintType created successfully', new PaintTypeResource($paintType));
    }

    /**
     * Afficher un type de peinture
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $paintType = PaintType::findOrFail($id);

        return $this->responseSuccess(null, new PaintTypeResource($paintType));
    }

    /**
     * Mettre à jour un type de peinture
     *
     * @authenticated
     */
    public function update(UpdatePaintTypeRequest $request, $id): JsonResponse
    {
        $paintType = PaintType::findOrFail($id);

        $paintType->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('PaintType updated Successfully', new PaintTypeResource($paintType));
    }

    /**
     * Supprimer un type de peinture
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $paintType = PaintType::findOrFail($id);

        // $paintType->delete();

        return $this->responseDeleted();
    }

   
}
