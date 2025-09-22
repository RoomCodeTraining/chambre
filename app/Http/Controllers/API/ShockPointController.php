<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\ShockPoint;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\ShockPoint\ShockPointResource;
use App\Http\Requests\ShockPoint\CreateShockPointRequest;
use App\Http\Requests\ShockPoint\UpdateShockPointRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des points de choc
 *
 * APIs pour la gestion des points de choc
 */
class ShockPointController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les points de choc
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $shockPoints = ShockPoint::with('status')
                    ->useFilters()
                    ->latest('updated_at')
                    ->dynamicPaginate();

        return ShockPointResource::collection($shockPoints);
    }

    /**
     * Ajouter un point de choc
     *
     * @authenticated
     */
    public function store(CreateShockPointRequest $request): JsonResponse
    {
        $exist = ShockPoint::select("*")
            ->where('label', $request->label)
            ->count();  

        if($exist > 0){

            $shockPoint = ShockPoint::select("*")
                ->where('label', $request->label)
                ->first();

            $shockPoint->update([
                'updated_at' => now()
            ]);

        } else{
            $code = strtolower(str_replace(' ', '', $request->label));

            if(ShockPoint::where('code', $code)->exists()){
                $code = $code . '-' . now()->timestamp;
            }

            $shockPoint = ShockPoint::create([
                'code' => $code,
                'label' => $request->label,
                'description' => $request->description,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('ShockPoint created successfully', new ShockPointResource($shockPoint));
    }

    /**
     * Afficher un point de choc
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $shockPoint = ShockPoint::findOrFail($id);

        return $this->responseSuccess(null, new ShockPointResource($shockPoint));
    }

    /**
     * Mettre à jour un point de choc
     *
     * @authenticated
     */
    public function update(UpdateShockPointRequest $request, $id): JsonResponse
    {
        $shockPoint = ShockPoint::findOrFail($id);
        $shockPoint->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('ShockPoint updated Successfully', new ShockPointResource($shockPoint));
    }

    /**
     * Supprimer un point de choc
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $shockPoint = ShockPoint::findOrFail($id);

        // $shockPoint->delete();

        return $this->responseDeleted();
    }

   
}
