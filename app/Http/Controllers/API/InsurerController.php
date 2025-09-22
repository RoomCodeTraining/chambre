<?php

namespace App\Http\Controllers\API;

use App\Models\Entity;
use App\Models\Insurer;
use App\Models\EntityType;
use App\Enums\EntityTypeEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\Entity\EntityResource;
use App\Http\Resources\Insurer\InsurerResource;
use App\Http\Requests\Insurer\CreateInsurerRequest;
use App\Http\Requests\Insurer\UpdateInsurerRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des assureurs
 *
 * API pour la gestion des assureurs
 */
class InsurerController extends Controller
{
    use ApiResponse;
    
    public function __construct()
    {

    }

    /**
     * Lister tous les assureurs
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $insurers = Entity::with('entityType', 'status')
            ->where('entity_type_id', EntityType::where('code', EntityTypeEnum::INSURER)->first()->id)
            ->latest('created_at')
            ->useFilters()
            ->dynamicPaginate();

        return EntityResource::collection($insurers);
    }

}
