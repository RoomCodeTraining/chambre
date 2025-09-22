<?php

namespace App\Http\Controllers\API;

use App\Models\Entity;
use App\Models\Repairer;
use App\Models\EntityType;
use App\Enums\EntityTypeEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\Entity\EntityResource;
use App\Http\Resources\Repairer\RepairerResource;
use App\Http\Requests\Repairer\CreateRepairerRequest;
use App\Http\Requests\Repairer\UpdateRepairerRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des réparateurs
 *
 * API pour la gestion des réparateurs
 */
class RepairerController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    /**
     * Lister tous les réparateurs
     *
     * @authenticated
     */ 
    public function index(): AnonymousResourceCollection
    {
        $repairers = Entity::with('entityType', 'status')
            ->where('entity_type_id', EntityType::where('code', EntityTypeEnum::REPAIRER)->first()->id)
            ->latest('created_at')
            ->useFilters()
            ->dynamicPaginate();

        return EntityResource::collection($repairers);
    }
   
}
