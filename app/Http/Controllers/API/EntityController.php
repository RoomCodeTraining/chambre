<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Entity;
use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\Operation;
use App\Models\EntityType;
use App\Models\CashRegister;
use App\Enums\OperationTypeEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Actions\Entity\CreateEntityAction;
use App\Actions\Entity\EnableEntityAction;
use App\Actions\Entity\UpdateEntityAction;
use App\Actions\Entity\DisableEntityAction;
use App\Http\Resources\Entity\EntityResource;
use App\Http\Requests\Entity\CreateEntityRequest;
use App\Http\Requests\Entity\UpdateEntityRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des entités
 *
 * APIs pour la gestion des entités
 */
class EntityController extends Controller
{
    use ApiResponse;
    
    public function __construct()
    {

    }

    /**
     * Lister les entités
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $entities = Entity::with(['entityType','status'])
                    ->useFilters()
                    ->latest('created_at')
                    ->dynamicPaginate();
            
        return EntityResource::collection($entities);
    }

    /**
     * Ajouter une entité
     *
     * @authenticated
     */
    public function store(CreateEntityRequest $request, CreateEntityAction $createEntity): JsonResponse
    {
        $exist = Entity::select("*")
            ->where('name', 'like', $request->name)
            ->where('entity_type_id', EntityType::firstWhere('code', $request->entity_type_code)->id)
            ->count();  

        if($exist > 0){

            $entity = Entity::select("*")
                ->where('name', 'like', $request->name)
                ->where('entity_type_id', EntityType::firstWhere('code', $request->entity_type_code)->id)
                ->first();  

        } else{
            $entity = $createEntity->execute($request->validated());

            if(isset($request->logo) && $request->hasfile('logo')){
                $now = Carbon::now();
                $annee = date("Y");
                $mois_jour_heure = date("mdH");
                $time = date("is");
                $today = $annee.'_'.$mois_jour_heure.'_'.$time;
    
                if($request->hasfile('logo'))
                {
                    $file = $request->file('logo');
                    // $name = 'IMG_BP'.$today.'_'.$count.'.'.$file->getClientOriginalExtension();
                    $name = 'LOG_'.$today.'.png';
                    $file->move(public_path('storage/logos'), $name);
    
                    $entity->update([
                        'logo' => $name,
                    ]);
                }
    
            }
        }

        return $this->responseCreated('Entity created successfully', new EntityResource($entity));
    }

    /**
     * Afficher une entité
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $entity = Entity::findOrFail($id);

        return $this->responseSuccess(null, new EntityResource($entity));
    }

    /**
     * Mettre à jour une entité
     *
     * @authenticated
     */
    public function update(UpdateEntityRequest $request, $id): JsonResponse
    {
        $entity = Entity::findOrFail($id);

        $entity->update([
            'name' => $request->name ?? $entity->name,
            'email' => $request->email ?? $entity->email,
            'service_description' => $request->service_description ?? $entity->service_description,
            'footer_description' => $request->footer_description ?? $entity->footer_description,
            'telephone' => $request->telephone ?? $entity->telephone,
            'address' => $request->address ?? $entity->address,
            'updated_by' => auth()->user()->id,
        ]);

        if(isset($request->logo) && $request->hasfile('logo'))
        {
            $file = $request->file('logo');
            $file->move(public_path('storage/logos'), $entity->logo);
        }

        return $this->responseSuccess('Entity updated Successfully', new EntityResource($entity));
    }

    /**
     * Activer une entité
     *
     * @authenticated
     */
    public function enable(Entity $entity, $id): JsonResponse
    {
        if(Entity::where('id',$id)->first()){
            $entity_u = Entity::where('id',$entity->id)->update([
                'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
                'updated_by' => auth()->user()->id,
            ]);
        } else {
            return $this->responseNotFound(null,"Entité introuvable.");
        }

        return $this->responseSuccess('Entity updated Successfully', null);
    }

    /**
     * Désactiver une entité
     *
     * @authenticated
     */
    public function disable(Entity $entity, $id): JsonResponse
    {
        if(Entity::where('id',$id)->first()){
            $entity_u = Entity::where('id',$entity->id)->update([
                'status_id' => Status::firstWhere('code', StatusEnum::INACTIVE)->id,
                'updated_by' => auth()->user()->id,
            ]);
        } else {
            return $this->responseNotFound(null,"Entité introuvable.");
        }

        return $this->responseSuccess('Entity updated Successfully', null);
    }

    /**
     * Supprimer une entité
     *
     * @authenticated
     */
    public function destroy(Entity $entity): JsonResponse
    {
        if($entity){
            $entity_u = Entity::where('id',$entity->id)->update([
                'name' => $entity->name."_old",
                'state' => 0,
                'deleted_by' => auth()->user()->id,
            ]);
            // $entity_d = Entity::where('id',$entity->id)->delete();
        } else {
            return $this->responseNotFound(null,"Entité introuvable.");
        }

        return $this->responseDeleted();
    }
   
}
