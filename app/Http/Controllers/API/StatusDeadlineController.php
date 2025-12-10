<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\StatusDeadline;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Models\GeneralStatusDeadline;
use App\Http\Resources\StatusDeadline\StatusDeadlineResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\StatusDeadline\CreateStatusDeadlineRequest;
use App\Http\Requests\StatusDeadline\UpdateStatusDeadlineRequest;

/**
 * @group Gestion des délais de statuts
 *
 * APIs pour la gestion des délais de statuts
 */
class StatusDeadlineController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    /**
     * Lister tous les délais de statuts
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $statusDeadlines = StatusDeadline::with('generalStatusDeadline', 'status')
                                    ->useFilters()
                                    ->latest('created_at')
                                    ->dynamicPaginate();

        return StatusDeadlineResource::collection($statusDeadlines);
    }

    /**
     * Créer un délai de statut
     *
     * @authenticated
     */
    public function store(CreateStatusDeadlineRequest $request): JsonResponse
    {
        $generalStatusDeadline = GeneralStatusDeadline::findOrFail($request->general_status_deadline_id);
        if($generalStatusDeadline->time_limit < $request->time_limit){
            return $this->responseError('Le délai est supérieur au délai général de ce statut cible');
        }
        $statusDeadline = StatusDeadline::create([
            'time_limit' => $request->time_limit,
            'entity_id' => auth()->user()->entity_id,
            'general_status_deadline_id' => $request->general_status_deadline_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('Délai de statut créé avec succès', new StatusDeadlineResource($statusDeadline));
    }

    /**
     * Afficher un délai de statut
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $statusDeadline = StatusDeadline::findOrFail(StatusDeadline::keyFromHashId($id));
        return $this->responseSuccess(null, new StatusDeadlineResource($statusDeadline->load('generalStatusDeadline', 'status')));
    }

    /**
     * Mettre à jour un délai de statut
     *
     * @authenticated
     */
    public function update(UpdateStatusDeadlineRequest $request, $id): JsonResponse
    {
        $statusDeadline = StatusDeadline::findOrFail(StatusDeadline::keyFromHashId($id));

        $statusDeadline->update([
            'time_limit' => $request->time_limit,
            'general_status_deadline_id' => $request->general_status_deadline_id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Délai de statut mis à jour avec succès', new StatusDeadlineResource($statusDeadline));
    }

    /**
     * Activer un délai de statut
     *
     * @authenticated
     */
    public function enable($id): JsonResponse
    {
        $statusDeadline = StatusDeadline::findOrFail(StatusDeadline::keyFromHashId($id));
        $statusDeadline->update([
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);
        return $this->responseSuccess('Délai de statut activé avec succès', new StatusDeadlineResource($statusDeadline));
    }

    /**
     * Désactiver un délai de statut
     *
     * @authenticated
     */
    public function disable($id): JsonResponse
    {
        $statusDeadline = StatusDeadline::findOrFail(StatusDeadline::keyFromHashId($id));
        $statusDeadline->update([
            'status_id' => Status::where('code', StatusEnum::INACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);
        return $this->responseSuccess('Délai de statut désactivé avec succès', new StatusDeadlineResource($statusDeadline));
    }

    /**
     * Supprimer un délai de statut
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $statusDeadline = StatusDeadline::findOrFail(StatusDeadline::keyFromHashId($id));
        $statusDeadline->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_by' => auth()->user()->id,
            'deleted_at' => Carbon::now(),
        ]);
        // $statusDeadline->delete();

        return $this->responseDeleted();
    }

   
}
