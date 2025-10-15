<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Models\NumberPaintElement;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\NumberPaintElement\NumberPaintElementResource;
use App\Http\Requests\NumberPaintElement\CreateNumberPaintElementRequest;
use App\Http\Requests\NumberPaintElement\UpdateNumberPaintElementRequest;

/**
 * @group Gestion des nombres d'éléments de peinture
 *
 * APIs pour la gestion des nombres d'éléments de peinture
 */
class NumberPaintElementController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    /**
     * Lister tous les éléments de peinture
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $numberPaintElements = NumberPaintElement::with('status')
                        ->latest('created_at')
                        ->useFilters()
                        ->dynamicPaginate();

        return NumberPaintElementResource::collection($numberPaintElements);
    }

    /**
     * Ajouter un élément de peinture
     *
     * @authenticated
     */
    public function store(CreateNumberPaintElementRequest $request): JsonResponse
    {
        $numberPaintElement = NumberPaintElement::create([
            'label' => $request->label,
            'description' => $request->description,
            'value' => $request->value,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('NumberPaintElement created successfully', new NumberPaintElementResource($numberPaintElement));
    }

    /**
     * Afficher un élément de peinture
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $numberPaintElement = NumberPaintElement::findOrFail(NumberPaintElement::keyFromHashId($id));

        return $this->responseSuccess(null, new NumberPaintElementResource($numberPaintElement));
    }

    /**
     * Mettre à jour un élément de peinture
     *
     * @authenticated
     */
    public function update(UpdateNumberPaintElementRequest $request, $id): JsonResponse
    {
        $numberPaintElement = NumberPaintElement::findOrFail(NumberPaintElement::keyFromHashId($id));
        $numberPaintElement->update([
            'label' => $request->label,
            'description' => $request->description,
            'value' => $request->value,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('NumberPaintElement updated Successfully', new NumberPaintElementResource($numberPaintElement));
    }

    /**
     * Supprimer un élément de peinture
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $numberPaintElement = NumberPaintElement::findOrFail(NumberPaintElement::keyFromHashId($id));

        // $numberPaintElement->delete();

        return $this->responseDeleted();
    }

   
}
