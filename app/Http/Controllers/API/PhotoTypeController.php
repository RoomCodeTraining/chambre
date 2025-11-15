<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoType\UpdatePhotoTypeRequest;
use App\Http\Requests\PhotoType\CreatePhotoTypeRequest;
use App\Http\Resources\PhotoType\PhotoTypeResource;
use App\Models\PhotoType;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des types de photos
 *
 * APIs pour la gestion des types de photos
 */
class PhotoTypeController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les types de photos
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $photoTypes = PhotoType::with('status:id,code,label')
                                ->latest('created_at')
                                ->useFilters()
                                ->dynamicPaginate();

        return PhotoTypeResource::collection($photoTypes);
    }

    /**
     * Créer un type de photo
     *
     * @authenticated
     */
    public function store(CreatePhotoTypeRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $photoType = PhotoType::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('PhotoType created successfully', new PhotoTypeResource($photoType));
    }

    /**
     * Afficher un type de photo
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $photoType = PhotoType::findOrFail(PhotoType::keyFromHashId($id));

        return $this->responseSuccess(null, new PhotoTypeResource($photoType->load('status:id,code,label')));
    }

    /**
     * Mettre à jour un type de photo
     *
     * @authenticated
     */
    public function update(UpdatePhotoTypeRequest $request, $id): JsonResponse
    {
        $photoType = PhotoType::findOrFail(PhotoType::keyFromHashId($id));
        $photoType->update([
            'code' => $request->code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('PhotoType updated Successfully', new PhotoTypeResource($photoType->load('status:id,code,label')));
    }

    /**
     * Activer un type de photo
     *
     * @authenticated
     */
    public function enable($id): JsonResponse
    {
        $photoType = PhotoType::findOrFail(PhotoType::keyFromHashId($id));

        $photoType->update([
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('PhotoType enabled successfully', new PhotoTypeResource($photoType->load('status:id,code,label')));
    }

    /**
     * Désactiver un type de photo
     *
     * @authenticated
     */
    public function disable($id): JsonResponse
    {
        $photoType = PhotoType::findOrFail(PhotoType::keyFromHashId($id));

        $photoType->update([
            'status_id' => Status::firstWhere('code', StatusEnum::INACTIVE)->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('PhotoType disabled successfully', new PhotoTypeResource($photoType->load('status:id,code,label')));
    }

    /**
     * Supprimer un type de photo
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $photoType = PhotoType::findOrFail(PhotoType::keyFromHashId($id));
        
        // $photoType->delete();

        return $this->responseDeleted();
    }
}

