<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\GeneralStatusDeadline;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\GeneralStatusDeadline\GeneralStatusDeadlineResource;
use App\Http\Requests\GeneralStatusDeadline\CreateGeneralStatusDeadlineRequest;
use App\Http\Requests\GeneralStatusDeadline\UpdateGeneralStatusDeadlineRequest;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des délais de statuts généraux
 *
 * APIs pour la gestion des délais de statuts généraux
 */
class GeneralStatusDeadlineController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    /**
     * Lister tous les délais de statuts généraux
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $generalStatusDeadlines = GeneralStatusDeadline::with('targetStatus', 'status')
                                    ->useFilters()
                                    ->latest('created_at')
                                    ->dynamicPaginate();

        return GeneralStatusDeadlineResource::collection($generalStatusDeadlines);
    }

    /**
     * Créer un délai de statut général
     *
     * @authenticated
     */
    public function store(CreateGeneralStatusDeadlineRequest $request): JsonResponse
    {
        $generalStatusDeadline = GeneralStatusDeadline::create([
            'label' => $request->label,
            'description' => $request->description,
            'time_limit' => $request->time_limit,
            'target_status_id' => $request->target_status_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('Délai de statut général créé avec succès', new GeneralStatusDeadlineResource($generalStatusDeadline));
    }

    /**
     * Afficher un délai de statut général
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $generalStatusDeadline = GeneralStatusDeadline::findOrFail(GeneralStatusDeadline::keyFromHashId($id));
        return $this->responseSuccess(null, new GeneralStatusDeadlineResource($generalStatusDeadline->load('targetStatus', 'status')));
    }

    /**
     * Mettre à jour un délai de statut général
     *
     * @authenticated
     */
    public function update(UpdateGeneralStatusDeadlineRequest $request, $id): JsonResponse
    {
        $generalStatusDeadline = GeneralStatusDeadline::findOrFail(GeneralStatusDeadline::keyFromHashId($id));
        $generalStatusDeadline->update([
            'label' => $request->label,
            'description' => $request->description,
            'time_limit' => $request->time_limit,
            'target_status_id' => $request->target_status_id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Délai de statut général mis à jour avec succès', new GeneralStatusDeadlineResource($generalStatusDeadline));
    }

    /**
     * Activer un délai de statut général
     *
     * @authenticated
     */
    public function enable($id): JsonResponse
    {
        $generalStatusDeadline = GeneralStatusDeadline::findOrFail(GeneralStatusDeadline::keyFromHashId($id));
        $generalStatusDeadline->update([
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);
        return $this->responseSuccess('Délai de statut général activé avec succès', new GeneralStatusDeadlineResource($generalStatusDeadline));
    }

    /**
     * Désactiver un délai de statut général
     *
     * @authenticated
     */
    public function disable($id): JsonResponse
    {
        $generalStatusDeadline = GeneralStatusDeadline::findOrFail(GeneralStatusDeadline::keyFromHashId($id));
        $generalStatusDeadline->update([
            'status_id' => Status::where('code', StatusEnum::INACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);
        return $this->responseSuccess('Délai de statut général désactivé avec succès', new GeneralStatusDeadlineResource($generalStatusDeadline));
    }

    /**
     * Supprimer un délai de statut général
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $generalStatusDeadline = GeneralStatusDeadline::findOrFail(GeneralStatusDeadline::keyFromHashId($id));
        $generalStatusDeadline->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_by' => auth()->user()->id,
            'deleted_at' => Carbon::now(),
        ]);
        // $generalStatusDeadline->delete();

        return $this->responseDeleted();
    }

   
}
