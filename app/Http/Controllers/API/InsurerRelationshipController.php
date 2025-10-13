<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsurerRelationship\UpdateInsurerRelationshipRequest;
use App\Http\Requests\InsurerRelationship\CreateInsurerRelationshipRequest;
use App\Http\Resources\InsurerRelationship\InsurerRelationshipResource;
use App\Models\InsurerRelationship;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;
use App\Enums\StatusEnum;
use App\Models\Status;

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
                                with('insurer:id,code,name', 'expertFirm:id,code,name', 'status:id,code,label', 'createdBy:id,name')
                                ->accessibleBy(auth()->user())
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
    public function show(InsurerRelationship $insurerRelationship): JsonResponse
    {
        $insurerRelationship = InsurerRelationship::
                                with('insurer:id,code,label', 'expertFirm:id,code,label', 'status:id,code,label', 'createdBy:id,name')
                                ->accessibleBy(auth()->user())
                                ->where('insurer_relationships.id', $insurerRelationship->id)
                                ->firstOrFail();

        return $this->responseSuccess(null, new InsurerRelationshipResource($insurerRelationship));
    }

    /**
     * Mettre à jour un rattachement assureur
     *
     * @authenticated
     */
    public function update(UpdateInsurerRelationshipRequest $request, InsurerRelationship $insurerRelationship): JsonResponse
    {
        $insurerRelationship = InsurerRelationship::
                                with('insurer:id,code,label', 'expertFirm:id,code,label', 'status:id,code,label', 'createdBy:id,name')
                                ->accessibleBy(auth()->user())
                                ->where('insurer_relationships.id', $insurerRelationship->id)
                                ->firstOrFail();

        $insurerRelationship->update($request->validated());

        return $this->responseSuccess('Le rattachement assureur a été mis à jour avec succès', new InsurerRelationshipResource($insurerRelationship));
    }

    /**
     * Activer un rattachement assureur
     *
     * @authenticated
     */
    public function enable(InsurerRelationship $insurerRelationship): JsonResponse
    {
        $insurerRelationship = InsurerRelationship::accessibleBy(auth()->user())
                                ->accessibleBy(auth()->user())
                                ->where('insurer_relationships.id', $insurerRelationship->id)
                                ->firstOrFail();

        $insurerRelationship->update(['status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id]);

        return $this->responseSuccess('Le rattachement assureur a été activé avec succès', new InsurerRelationshipResource($insurerRelationship));
    }

    /**
     * Désactiver un rattachement assureur
     *
     * @authenticated
     */
    public function disable(InsurerRelationship $insurerRelationship): JsonResponse
    {
        $insurerRelationship = InsurerRelationship::accessibleBy(auth()->user())
                                ->accessibleBy(auth()->user())
                                ->where('insurer_relationships.id', $insurerRelationship->id)
                                ->firstOrFail();

        $insurerRelationship->update(['status_id' => Status::firstWhere('code', StatusEnum::INACTIVE)->id]);

        return $this->responseSuccess('Le rattachement assureur a été désactivé avec succès', new InsurerRelationshipResource($insurerRelationship));
    }
   
}
