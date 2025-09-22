<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Remark\UpdateRemarkRequest;
use App\Http\Requests\Remark\CreateRemarkRequest;
use App\Http\Resources\Remark\RemarkResource;
use App\Models\Remark;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;
use App\Enums\StatusEnum;
use App\Models\Status;
use Carbon\Carbon;

/**
 * @group Gestion des remarques
 *
 * APIs pour la gestion des remarques
 */
class RemarkController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les remarques
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $remarks = Remark::with('status:id,label')->useFilters()->dynamicPaginate();

        return RemarkResource::collection($remarks);
    }

    /**
     * Créer une remarque
     *
     * @authenticated
     */
    public function store(CreateRemarkRequest $request): JsonResponse
    {
        $exist = Remark::select("*")
            ->where('label', 'like', $request->label)
            ->count();  

        if($exist > 0){

            $remark = Remark::select("*")
                ->where('label', 'like', $request->label)
                ->first();

        } else{
            $remark = Remark::create([
                'label' => $request->label,
                'description' => $request->description,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('Remark created successfully', new RemarkResource($remark));
    }

    /**
     * Afficher une remarque
     *
     * @authenticated
     */
    public function show(Remark $remark): JsonResponse
    {
        return $this->responseSuccess(null, new RemarkResource($remark->load('status:id,label')));
    }

    /**
     * Mettre à jour une remarque
     *
     * @authenticated
     */
    public function update(UpdateRemarkRequest $request, $id): JsonResponse
    {
        $remark = Remark::find($id);

        $remark->update([
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Remark updated Successfully', new RemarkResource($remark));
    }

    /**
     * Supprimer une remarque
     *
     * @authenticated
     */
    public function destroy(Remark $remark): JsonResponse
    {
        $remark->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => Carbon::now(),
        ]);

        return $this->responseDeleted();
    }

   
}
