<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\PaintProductPrice;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\PaintProductPrice\PaintProductPriceResource;
use App\Http\Requests\PaintProductPrice\CreatePaintProductPriceRequest;
use App\Http\Requests\PaintProductPrice\UpdatePaintProductPriceRequest;

/**
 * @group Gestion des tarifs des produits de peinture
 *
 * APIs pour la gestion des tarifs des produits de peinture
 */
class PaintProductPriceController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    /**
     * Lister tous les tarifs de produits de peinture
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $paintProductPrices = PaintProductPrice::with('paintType', 'numberPaintElement', 'status')
                    ->useFilters()
                    ->latest('created_at')
                    ->dynamicPaginate();

        return PaintProductPriceResource::collection($paintProductPrices);
    }

    /**
     * Ajouter un tarif de produit de peinture
     *
     * @authenticated
     */
    public function store(CreatePaintProductPriceRequest $request): JsonResponse
    {
        $paintProductPrice = PaintProductPrice::create([
            'value' => $request->value,
            'paint_type_id' => $request->paint_type_id,
            'number_paint_element_id' => $request->number_paint_element_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('PaintProductPrice created successfully', new PaintProductPriceResource($paintProductPrice));
    }

    /**
     * Afficher un tarif de produit de peinture
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $paintProductPrice = PaintProductPrice::findOrFail(PaintProductPrice::keyFromHashId($id));

        return $this->responseSuccess(null, new PaintProductPriceResource($paintProductPrice->load('paintType', 'numberPaintElement', 'status')));
    }

    /**
     * Mettre à jour un tarif de produit de peinture
     *
     * @authenticated
     */
    public function update(UpdatePaintProductPriceRequest $request, $id): JsonResponse
    {
        $paintProductPrice = PaintProductPrice::findOrFail(PaintProductPrice::keyFromHashId($id));

        $paintProductPrice->update([
            'value' => $request->value,
            'paint_type_id' => $request->paint_type_id,
            'number_paint_element_id' => $request->number_paint_element_id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('PaintProductPrice updated Successfully', new PaintProductPriceResource($paintProductPrice));
    }

    /**
     * Supprimer un tarif de produit de peinture
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $paintProductPrice = PaintProductPrice::findOrFail(PaintProductPrice::keyFromHashId($id));

        // $paintProductPrice->delete();

        return $this->responseDeleted();
    }

   
}
