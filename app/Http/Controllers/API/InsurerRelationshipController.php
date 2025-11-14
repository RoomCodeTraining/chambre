<?php

namespace App\Http\Controllers\API;

use App\Models\Entity;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Models\InsurerRelationship;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\InsurerRelationship\InsurerRelationshipResource;
use App\Http\Requests\InsurerRelationship\CreateInsurerRelationshipRequest;
use App\Http\Requests\InsurerRelationship\UpdateInsurerRelationshipRequest;

/**
 * @group Gestion des rattachements assureurs
 *
 * APIs pour la gestion des rattachements assureurs
 */
class InsurerRelationshipController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les rattachements assureurs
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $insurerRelationships = InsurerRelationship::
                                with('insurer:id,code,name,logo', 'expertFirm:id,code,name,logo', 'status:id,code,label', 'createdBy:id,name');

        if(request()->has('expert_firm_id')){
            $insurerRelationships = $insurerRelationships->where('expert_firm_id', Entity::keyFromHashId(request()->expert_firm_id));
        }

        if(request()->has('insurer_id')){
            $insurerRelationships = $insurerRelationships->where('insurer_id', Entity::keyFromHashId(request()->insurer_id));
        }

        if(request()->has('status_id')){
            $insurerRelationships = $insurerRelationships->where('status_id', Status::keyFromHashId(request()->status_id));
        }

        $insurerRelationships = $insurerRelationships->accessibleBy(auth()->user())
                                                    ->latest('created_at')
                                                    ->useFilters()
                                                    ->dynamicPaginate();

        return InsurerRelationshipResource::collection($insurerRelationships);
    }

    /**
     * Créer un rattachement assureur
     *
     * @authenticated
     */
    public function store(CreateInsurerRelationshipRequest $request): JsonResponse
    {
        $insurerRelationship = InsurerRelationship::create([
            'expert_firm_id' => auth()->user()->entity_id,
            'insurer_id' => $request->insurer_id,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('Le rattachement assureur a été créé avec succès', new InsurerRelationshipResource($insurerRelationship));
    }

    /**
     * Afficher un rattachement assureur
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $insurerRelationship = InsurerRelationship::
                                with('insurer:id,code,name,logo', 'expertFirm:id,code,name,logo', 'status:id,code,label', 'createdBy:id,name')
                                ->accessibleBy(auth()->user())
                                ->where('insurer_relationships.id', InsurerRelationship::keyFromHashId($id))
                                ->firstOrFail();

        return $this->responseSuccess(null, new InsurerRelationshipResource($insurerRelationship));
    }

    /**
     * Mettre à jour un rattachement assureur
     *
     * @authenticated
     */
    public function update(UpdateInsurerRelationshipRequest $request, $id): JsonResponse
    {
        $insurerRelationship = InsurerRelationship::
                                with('insurer:id,code,label', 'expertFirm:id,code,label', 'status:id,code,label', 'createdBy:id,name')
                                ->accessibleBy(auth()->user())
                                ->where('insurer_relationships.id', InsurerRelationship::keyFromHashId($id))
                                ->firstOrFail();

        $insurerRelationship->update($request->validated());

        return $this->responseSuccess('Le rattachement assureur a été mis à jour avec succès', new InsurerRelationshipResource($insurerRelationship));
    }

    /**
     * Activer un rattachement assureur
     *
     * @authenticated
     */
    public function enable($id): JsonResponse
    {
        $insurerRelationship = InsurerRelationship::accessibleBy(auth()->user())
                                ->accessibleBy(auth()->user())
                                ->where('insurer_relationships.id', InsurerRelationship::keyFromHashId($id))
                                ->firstOrFail();

        $insurerRelationship->update(['status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id]);

        return $this->responseSuccess('Le rattachement assureur a été activé avec succès', new InsurerRelationshipResource($insurerRelationship));
    }

    /**
     * Désactiver un rattachement assureur
     *
     * @authenticated
     */
    public function disable($id): JsonResponse
    {
        $insurerRelationship = InsurerRelationship::accessibleBy(auth()->user())
                                ->accessibleBy(auth()->user())
                                ->where('insurer_relationships.id', InsurerRelationship::keyFromHashId($id))
                                ->firstOrFail();

        $insurerRelationship->update(['status_id' => Status::firstWhere('code', StatusEnum::INACTIVE)->id]);

        return $this->responseSuccess('Le rattachement assureur a été désactivé avec succès', new InsurerRelationshipResource($insurerRelationship));
    }
   
}
