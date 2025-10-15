<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\PaintingPrice;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\PaintingPrice\PaintingPriceResource;
use App\Http\Requests\PaintingPrice\CreatePaintingPriceRequest;
use App\Http\Requests\PaintingPrice\UpdatePaintingPriceRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des tarifs de peinture
 *
 * APIs pour la gestion des tarifs de peinture
 */
class PaintingPriceController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les tarifs de peinture
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $paintingPrices = PaintingPrice::with('hourlyRate', 'paintType', 'numberPaintElement', 'status')
                    ->useFilters()
                    ->latest('created_at')
                    ->dynamicPaginate();

        return PaintingPriceResource::collection($paintingPrices);
    }

    /**
     * Ajouter un tarif de peinture
     *
     * @authenticated
     */
    public function store(CreatePaintingPriceRequest $request): JsonResponse
    {
        $paintingPrice = PaintingPrice::create([
            'param_1' => $request->param_1,
            'param_2' => $request->param_2,
            'hourly_rate_id' => $request->hourly_rate_id,
            'paint_type_id' => $request->paint_type_id,
            'number_paint_element_id' => $request->number_paint_element_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('PaintingPrice created successfully', new PaintingPriceResource($paintingPrice));
    }

    /**
     * Afficher un tarif de peinture
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $paintingPrice = PaintingPrice::findOrFail(PaintingPrice::keyFromHashId($id));

        return $this->responseSuccess(null, new PaintingPriceResource($paintingPrice->load('hourlyRate', 'paintType', 'numberPaintElement', 'status')));
    }

    /**
     * Mettre à jour un tarif de peinture
     *
     * @authenticated
     */
    public function update(UpdatePaintingPriceRequest $request, $id): JsonResponse
    {
        $paintingPrice = PaintingPrice::findOrFail(PaintingPrice::keyFromHashId($id));
        $paintingPrice->update([
            'param_1' => $request->param_1,
            'param_2' => $request->param_2,
            'hourly_rate_id' => $request->hourly_rate_id,
            'paint_type_id' => $request->paint_type_id,
            'number_paint_element_id' => $request->number_paint_element_id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('PaintingPrice updated Successfully', new PaintingPriceResource($paintingPrice));
    }

    /**
     * Supprimer un tarif de peinture
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $paintingPrice = PaintingPrice::findOrFail(PaintingPrice::keyFromHashId($id));

        // $paintingPrice->delete();

        return $this->responseDeleted();
    }

   
}
