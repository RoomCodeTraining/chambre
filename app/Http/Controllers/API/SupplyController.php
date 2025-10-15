<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Models\Supply;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\Supply\SupplyResource;
use App\Http\Requests\Supply\CreateSupplyRequest;
use App\Http\Requests\Supply\UpdateSupplyRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des fournitures
 *
 * APIs pour la gestion des fournitures
 */
class SupplyController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les fournitures
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $supplies = Supply::with('status')
                        ->latest('updated_at')
                        ->useFilters()
                        ->dynamicPaginate();

        return SupplyResource::collection($supplies);
    }

    /**
     * Ajouter une fourniture
     *
     * @authenticated
     */
    public function store(CreateSupplyRequest $request): JsonResponse
    {
        $exist = Supply::select("*")
            // ->where('label', 'like', $request->label)
            ->where('label', $request->label)
            ->count();  

        if($exist > 0){

            $supply = Supply::select("*")
                // ->where('label', 'like', $request->label)
                ->where('label', $request->label)
                ->first();  

            $supply->update([
                'updated_at' => now()
            ]);

        } else{
            $code = strtolower(str_replace(' ', '', $request->label));

            if(Supply::where('code', $code)->exists()){
                $code = $code . '-' . now()->timestamp;
            }

            $supply = Supply::create([
                'code' => $code,
                'label' => $request->label,
                'description' => $request->description,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('Supply created successfully', new SupplyResource($supply));
    }

    /**
     * Afficher une fourniture
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $supply = Supply::findOrFail(Supply::keyFromHashId($id));

        return $this->responseSuccess(null, new SupplyResource($supply));
    }

    /**
     * Mettre à jour une fourniture
     *
     * @authenticated
     */
    public function update(UpdateSupplyRequest $request, $id): JsonResponse
    {
        $supply = Supply::findOrFail(Supply::keyFromHashId($id));
        $supply->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Supply updated Successfully', new SupplyResource($supply));
    }

    /**
     * Supprimer une fourniture
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $supply = Supply::findOrFail(Supply::keyFromHashId($id));

        // $supply->delete();

        return $this->responseDeleted();
    }

   
}
