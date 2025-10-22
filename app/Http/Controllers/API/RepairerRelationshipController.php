<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepairerRelationship\UpdateRepairerRelationshipRequest;
use App\Http\Requests\RepairerRelationship\CreateRepairerRelationshipRequest;
use App\Http\Resources\RepairerRelationship\RepairerRelationshipResource;
use App\Models\RepairerRelationship;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;
use App\Enums\StatusEnum;
use App\Models\Status;

/**
 * @group Gestion des rattachements réparateurs
 *
 * APIs pour la gestion des rattachements réparateurs
 */
class RepairerRelationshipController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les rattachements réparateurs
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $repairerRelationships = RepairerRelationship::
                                with('repairer:id,code,name', 'expertFirm:id,code,name', 'status:id,code,label', 'createdBy:id,name');
        if(request()->has('expert_firm_id')){
            $repairerRelationships = $repairerRelationships->where('expert_firm_id', Entity::keyFromHashId(request()->expert_firm_id));
        }

        $repairerRelationships = $repairerRelationships->accessibleBy(auth()->user())
                                                      ->latest('created_at')
                                                      ->useFilters()
                                                      ->dynamicPaginate();

        return RepairerRelationshipResource::collection($repairerRelationships);
    }

    /**
     * Créer un rattachement réparateur
     *
     * @authenticated
     */
    public function store(CreateRepairerRelationshipRequest $request): JsonResponse
    {
        $repairerRelationship = RepairerRelationship::create([
            'expert_firm_id' => auth()->user()->entity_id,
            'repairer_id' => $request->repairer_id,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('Le rattachement réparateur a été créé avec succès', new RepairerRelationshipResource($repairerRelationship));
    }

    /**
     * Afficher un rattachement réparateur
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $repairerRelationship = RepairerRelationship::
                                with('repairer:id,code,label', 'expertFirm:id,code,label', 'status:id,code,label', 'createdBy:id,name')
                                ->accessibleBy(auth()->user())
                                ->where('repairer_relationships.id', RepairerRelationship::keyFromHashId($id))
                                ->firstOrFail();

        return $this->responseSuccess(null, new RepairerRelationshipResource($repairerRelationship));
    }

    /**
     * Mettre à jour un rattachement réparateur
     *
     * @authenticated
     */
    public function update(UpdateRepairerRelationshipRequest $request, $id): JsonResponse
    {
        $repairerRelationship = RepairerRelationship::
                                with('repairer:id,code,label', 'expertFirm:id,code,label', 'status:id,code,label', 'createdBy:id,name')
                                ->accessibleBy(auth()->user())
                                ->where('repairer_relationships.id', RepairerRelationship::keyFromHashId($id))
                                ->firstOrFail();

        $repairerRelationship->update($request->validated());

        return $this->responseSuccess('RepairerRelationship updated Successfully', new RepairerRelationshipResource($repairerRelationship));
    }

    /**
     * Activer un rattachement réparateur
     *
     * @authenticated
     */
    public function enable($id): JsonResponse
    {
        $repairerRelationship = RepairerRelationship::accessibleBy(auth()->user())
                                ->where('repairer_relationships.id', RepairerRelationship::keyFromHashId($id))
                                ->firstOrFail();

        $repairerRelationship->update(['status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id]);

        return $this->responseSuccess('Le rattachement réparateur a été activé avec succès', new RepairerRelationshipResource($repairerRelationship));
    }

    /**
     * Désactiver un rattachement réparateur
     *
     * @authenticated
     */
    public function disable($id): JsonResponse
    {
        $repairerRelationship = RepairerRelationship::accessibleBy(auth()->user())
                                ->where('repairer_relationships.id', RepairerRelationship::keyFromHashId($id))
                                ->firstOrFail();

        $repairerRelationship->update(['status_id' => Status::firstWhere('code', StatusEnum::INACTIVE)->id]);

        return $this->responseSuccess('Le rattachement réparateur a été désactivé avec succès', new RepairerRelationshipResource($repairerRelationship));
    }

}
