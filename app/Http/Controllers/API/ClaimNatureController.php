<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClaimNature\UpdateClaimNatureRequest;
use App\Http\Requests\ClaimNature\CreateClaimNatureRequest;
use App\Http\Resources\ClaimNature\ClaimNatureResource;
use App\Models\ClaimNature;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des natures de sinistre
 *
 * APIs pour la gestion des natures de sinistre
 */
class ClaimNatureController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les natures de sinistre
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $ClaimNatures = ClaimNature::with('status:id,code,label')
            ->useFilters()
            ->latest('created_at')
            ->dynamicPaginate();

        return ClaimNatureResource::collection($ClaimNatures);
    }

    /**
     * Créer une nature de sinistre
     *
     * @authenticated
     */
    public function store(CreateClaimNatureRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));
        $ClaimNature = ClaimNature::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('ClaimNature created successfully', new ClaimNatureResource($ClaimNature));
    }

    /**
     * Afficher une nature de sinistre
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $ClaimNature = ClaimNature::with('status:id,code,label')
            ->findOrFail(ClaimNature::keyFromHashId($id));

        return $this->responseSuccess(null, new ClaimNatureResource($ClaimNature));
    }

    /**
     * Mettre à jour une nature de sinistre
     *
     * @authenticated
     */
    public function update(UpdateClaimNatureRequest $request, $id): JsonResponse
    {
        $ClaimNature = ClaimNature::findOrFail(ClaimNature::keyFromHashId($id));
        $ClaimNature->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('ClaimNature updated Successfully', new ClaimNatureResource($ClaimNature));
    }

    /**
     * Supprimer une nature de sinistre
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $ClaimNature = ClaimNature::findOrFail(ClaimNature::keyFromHashId($id));
        // $ClaimNature->update([
        //     'deleted_by' => auth()->user()->id,
        // ]);

        return $this->responseDeleted();
    }

   
}
