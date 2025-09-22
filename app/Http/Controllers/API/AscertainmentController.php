<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\Ascertainment;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\Ascertainment\AscertainmentResource;
use App\Http\Requests\Ascertainment\CreateAscertainmentRequest;
use App\Http\Requests\Ascertainment\UpdateAscertainmentRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des constats
 *
 * APIs pour la gestion des constats
 */
class AscertainmentController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister les constats
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $ascertainments = Ascertainment::with('status:id,code,label', 'ascertainmentType:id,code,label')
            ->useFilters()
            ->dynamicPaginate();

        return AscertainmentResource::collection($ascertainments);
    }

    /**
     * Créer un constat
     *
     * @authenticated
     */
    public function store(CreateAscertainmentRequest $request): JsonResponse
    {
        $ascertainments = $request->get('ascertainments');

        foreach ($ascertainments as $ascertainment) {
            $ascertainment = Ascertainment::create([
                'assignment_id' => $request->assignment_id,
                'ascertainment_type_id' => $ascertainment['ascertainment_type_id'],
                'very_good' => $ascertainment['very_good'],
                'good' => $ascertainment['good'],
                'acceptable' => $ascertainment['acceptable'],
                'less_good' => $ascertainment['less_good'],
                'bad' => $ascertainment['bad'],
                'very_bad' => $ascertainment['very_bad'],
                'comment' => $ascertainment['comment'],
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('Ascertainment created successfully', new AscertainmentResource($ascertainment));
    }

    /**
     * Afficher un constat
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $ascertainment = Ascertainment::findOrFail($id);

        return $this->responseSuccess(null, new AscertainmentResource($ascertainment->load('assignment','ascertainmentType:id,code,label','status:id,code,label')));
    }

    /**
     * Mettre à jour un constat
     *
     * @authenticated
     */
    public function update(UpdateAscertainmentRequest $request, $id): JsonResponse
    {
        $ascertainment = Ascertainment::findOrFail($id);
        $ascertainment->update([
            'ascertainment_type_id' => $request->ascertainment_type_id,
            'very_good' => $request->very_good,
            'good' => $request->good,
            'acceptable' => $request->acceptable,
            'less_good' => $request->less_good,
            'bad' => $request->bad,
            'very_bad' => $request->very_bad,
            'comment' => $request->comment,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Ascertainment updated Successfully', new AscertainmentResource($ascertainment->load('assignment','ascertainmentType:id,code,label','status:id,code,label')));
    }

    /**
     * Supprimer un constat
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $ascertainment = Ascertainment::findOrFail($id);

        $ascertainment->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_at' => now(),
            'deleted_by' => auth()->user()->id,
        ]);

        // $ascertainment->delete();

        return $this->responseDeleted();
    }

   
}
