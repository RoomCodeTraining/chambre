<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\FneSetting;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\FneSetting\FneSettingResource;
use App\Http\Requests\FneSetting\CreateFneSettingRequest;
use App\Http\Requests\FneSetting\UpdateFneSettingRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des paramètres FNE
 *
 * APIs pour la gestion des paramètres FNE
 */
class FneSettingController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    /**
     * Lister tous les paramètres FNE
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $fneSettings = FneSetting::with('entity', 'status')
                        ->accessibleBy(auth()->user())
                        ->useFilters()
                        ->latest('created_at')
                        ->dynamicPaginate();

        return FneSettingResource::collection($fneSettings);
    }

    /**
     * Créer un paramètre FNE
     *
     * @authenticated
     */
    public function store(CreateFneSettingRequest $request): JsonResponse
    {
        $fneSetting = FneSetting::create([
            'point_sale' => $request->point_sale,
            'establishment' => $request->establishment,
            'commercial_message' => $request->commercial_message,
            'footer' => $request->footer,
            'token' => $request->token,
            'entity_id' => $request->entity_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('FneSetting created successfully', new FneSettingResource($fneSetting));
    }

    /**
     * Afficher un paramètre FNE
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $fneSetting = FneSetting::accessibleBy(auth()->user())->findOrFail(FneSetting::keyFromHashId($id));
        return $this->responseSuccess(null, new FneSettingResource($fneSetting->load('entity', 'status')));
    }

    /**
     * Mettre à jour un paramètre FNE
     *
     * @authenticated
     */
    public function update(UpdateFneSettingRequest $request, FneSetting $fneSetting): JsonResponse
    {
        $fneSetting->update([
            'point_sale' => $request->point_sale,
            'establishment' => $request->establishment,
            'commercial_message' => $request->commercial_message,
            'footer' => $request->footer,
            'token' => $request->token,
            'entity_id' => $request->entity_id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('FneSetting updated Successfully', new FneSettingResource($fneSetting));
    }

    /**
     * Activer un paramètre FNE
     *
     * @authenticated
     */
    public function enable($id): JsonResponse
    {
        $fneSetting = FneSetting::accessibleBy(auth()->user())->findOrFail(FneSetting::keyFromHashId($id));
        $fneSetting->update([
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('FneSetting enabled Successfully', new FneSettingResource($fneSetting));
    }

    /**
     * Désactiver un paramètre FNE
     *
     * @authenticated
     */
    public function disable($id): JsonResponse
    {
        $fneSetting = FneSetting::accessibleBy(auth()->user())->findOrFail(FneSetting::keyFromHashId($id));
        $fneSetting->update([
            'status_id' => Status::where('code', StatusEnum::INACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('FneSetting disabled Successfully', new FneSettingResource($fneSetting));
    }

    /**
     * Supprimer un paramètre FNE
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $fneSetting = FneSetting::accessibleBy(auth()->user())->findOrFail(FneSetting::keyFromHashId($id));
        $fneSetting->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_by' => auth()->user()->id,
            'deleted_at' => Carbon::now(),
        ]);

        $fneSetting->delete();

        return $this->responseDeleted();
    }
}
