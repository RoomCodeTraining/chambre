<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\HourlyRate;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\HourlyRate\HourlyRateResource;
use App\Http\Requests\HourlyRate\CreateHourlyRateRequest;
use App\Http\Requests\HourlyRate\UpdateHourlyRateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des taux horaires
 *
 * APIs pour la gestion des taux horaires
 */
class HourlyRateController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les taux horaires
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $hourlyRates = HourlyRate::useFilters()->dynamicPaginate();

        return HourlyRateResource::collection($hourlyRates);
    }

    /**
     * Ajouter un taux horaire
     *
     * @authenticated
     */
    public function store(CreateHourlyRateRequest $request): JsonResponse
    {
        $hourlyRate = HourlyRate::create([
            'label' => $request->label,
            'description' => $request->description,
            'value' => $request->value,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('HourlyRate created successfully', new HourlyRateResource($hourlyRate));
    }

    /**
     * Afficher un taux horaire
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $hourlyRate = HourlyRate::findOrFail($id);

        return $this->responseSuccess(null, new HourlyRateResource($hourlyRate));
    }

    /**
     * Mettre à jour un taux horaire
     *
     * @authenticated
     */
    public function update(UpdateHourlyRateRequest $request, $id): JsonResponse
    {
        $hourlyRate = HourlyRate::findOrFail($id);

        $hourlyRate->update([
            'label' => $request->label,
            'description' => $request->description,
            'value' => $request->value,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('HourlyRate updated Successfully', new HourlyRateResource($hourlyRate));
    }

    /**
     * Supprimer un taux horaire
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $hourlyRate = HourlyRate::findOrFail($id);

        // $hourlyRate->delete();

        return $this->responseDeleted();
    }

   
}
