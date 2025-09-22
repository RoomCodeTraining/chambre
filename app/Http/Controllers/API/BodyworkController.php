<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Models\Bodywork;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Bodywork\BodyworkResource;
use App\Http\Requests\Bodywork\CreateBodyworkRequest;
use App\Http\Requests\Bodywork\UpdateBodyworkRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des carrosseries
 *
 * APIs pour la gestion des carrosseries
 */
class BodyworkController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les carrosseries
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $bodyworks = Bodywork::with('status:id,code,label')
            ->useFilters()
            ->latest('created_at')
            ->dynamicPaginate();

        return BodyworkResource::collection($bodyworks);
    }

    /**
     * Ajouter une carrosserie
     *
     * @authenticated
     */
    public function store(CreateBodyworkRequest $request): JsonResponse
    {
        $exist = Bodywork::select("*")
            ->where('label', 'like', $request->label)
            ->count();  

        if($exist > 0){

            $bodywork = Bodywork::select("*")
                ->where('label', 'like', $request->label)
                ->first();

        } else{
            $code = strtolower(str_replace(' ', '', $request->label));

            if(Bodywork::where('code', $code)->exists()){
                $code = $code . '-' . now()->timestamp;
            }

            $bodywork = Bodywork::create([
                'code' => $code,
                'label' => $request->label,
                'description' => $request->description,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('Bodywork created successfully', new BodyworkResource($bodywork));
    }

    /**
     * Afficher une carrosserie
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $bodywork = Bodywork::findOrFail($id);

        return $this->responseSuccess(null, new BodyworkResource($bodywork));
    }

    /**
     * Mettre à jour une carrosserie
     *
     * @authenticated
     */
    public function update(UpdateBodyworkRequest $request, $id): JsonResponse
    {
        $bodywork = Bodywork::findOrFail($id);

        $bodywork->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Bodywork updated Successfully', new BodyworkResource($bodywork));
    }

    /**
     * Supprimer une carrosserie
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $bodywork = Bodywork::findOrFail($id);

        // $bodywork->delete();

        return $this->responseDeleted();
    }

   
}
