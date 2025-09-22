<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\EntityType;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Actions\EntityType\CreateEntityTypeAction;
use App\Http\Resources\EntityType\EntityTypeResource;
use App\Http\Requests\EntityType\CreateEntityTypeRequest;
use App\Http\Requests\EntityType\UpdateEntityTypeRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des types d'entité
 *
 * APIs pour la gestion des types d'entité
 */
class EntityTypeController extends Controller
{
    use ApiResponse;
    
    public function __construct()
    {

    }

    /**
     * Lister les types d'entité
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $entityTypes = EntityType::useFilters()->dynamicPaginate();

        return EntityTypeResource::collection($entityTypes);
    }

    /**
     * Ajouter un type d'entité
     *
     * @authenticated
     */
    public function store(CreateEntityTypeRequest $request, CreateEntityTypeAction $createEntityType): JsonResponse
    {
        $entityType = $createEntityType->execute($request->validated());

        return $this->responseCreated('Type d\'entité créé avec succès', new EntityTypeResource($entityType));
    }

    /**
     * Afficher un type d'entité
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {   
        $entityType = EntityType::findOrFail($id);

        return $this->responseSuccess(null, new EntityTypeResource($entityType));
    }

    /**
     * Mettre à jour un type d'entité
     *
     * @authenticated
     */
    public function update(UpdateEntityTypeRequest $request, $id): JsonResponse
    {
        $entityType = EntityType::findOrFail($id);

        $entityType->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Type d\'entité mis à jour avec succès', new EntityTypeResource($entityType));
    }

    /**
     * Activer un type d'entité
     *
     * @authenticated
     */
    public function enable(EntityType $entityType, $id): JsonResponse
    {   
        $entityType = EntityType::findOrFail($id);

        if(EntityType::where('id',$id)->first()){
            $entityType_u = EntityType::where('id',$entityType->id)->update([
                'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
                'updated_by' => auth()->user()->id,
            ]);
        } else {
            return $this->responseNotFound(null,"Entité introuvable.");
        }

        return $this->responseSuccess('Type d\'entité mis à jour avec succès', null);
    }

    /**
     * Désactiver un type d'entité
     *
     * @authenticated
     */
    public function disable(EntityType $entityType, $id): JsonResponse
    {   
        $entityType = EntityType::findOrFail($id);

        if(EntityType::where('id',$id)->first()){
            $entityType_u = EntityType::where('id',$entityType->id)->update([
                'status_id' => Status::firstWhere('code', StatusEnum::INACTIVE)->id,
                'updated_by' => auth()->user()->id,
            ]);
        } else {
            return $this->responseNotFound(null,"Entité introuvable.");
        }

        return $this->responseSuccess('Type d\'entité mis à jour avec succès', null);
    }

    /**
     * Supprimer un type d'entité
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $entityType = EntityType::findOrFail($id);

        // $entityType->delete();

        return $this->responseDeleted();
    }

   
}
