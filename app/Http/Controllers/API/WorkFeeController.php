<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Models\WorkFee;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkFee\WorkFeeResource;
use App\Http\Requests\WorkFee\CreateWorkFeeRequest;
use App\Http\Requests\WorkFee\UpdateWorkFeeRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des honoraires
 *
 * APIs pour la gestion des honoraires
 */
class WorkFeeController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les honoraires
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $workFees = WorkFee::with('status')
                    ->useFilters()
                    ->latest('created_at')
                    ->dynamicPaginate();

        return WorkFeeResource::collection($workFees);
    }

    /**
     * Créer un honoraire
     *
     * @authenticated
     */
    public function store(CreateWorkFeeRequest $request): JsonResponse
    {
        $workFee = WorkFee::create([
            'param_1' => $request->param_1,
            'param_2' => $request->param_2,
            'param_3' => $request->param_3,
            'param_4' => $request->param_4,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('WorkFee created successfully', new WorkFeeResource($workFee));
    }

    /**
     * Afficher un honoraire
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $workFee = WorkFee::findOrFail($id);

        return $this->responseSuccess(null, new WorkFeeResource($workFee->load('status')));
    }

    /**
     * Mettre à jour un honoraire
     *
     * @authenticated
     */
    public function update(UpdateWorkFeeRequest $request, $id): JsonResponse
    {
        $workFee = WorkFee::findOrFail($id);
        
        $workFee->update([
            'param_1' => $request->param_1,
            'param_2' => $request->param_2,
            'param_3' => $request->param_3,
            'param_4' => $request->param_4,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('WorkFee updated Successfully', new WorkFeeResource($workFee));
    }

    /**
     * Supprimer un honoraire
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $workFee = WorkFee::findOrFail($id);

        // $workFee->delete();

        return $this->responseDeleted();
    }

   
}
