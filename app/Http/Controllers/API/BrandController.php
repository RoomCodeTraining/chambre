<?php

namespace App\Http\Controllers\API;

use App\Models\Brand;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\Brand\BrandResource;
use App\Http\Requests\Brand\CreateBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des marques de véhicules
 *
 * APIs pour la gestion des marques de véhicules
 */
class BrandController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les marques
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $brands = Brand::with('status:id,code,label')
                    ->useFilters()
                    ->latest('created_at')
                    ->dynamicPaginate();

        return BrandResource::collection($brands);
    }

    /**
     * Ajouter une marque
     *
     * @authenticated
     */
    public function store(CreateBrandRequest $request): JsonResponse
    {
        $exist = Brand::select("*")
            ->where('label', 'like', $request->label)
            ->count();  

        if($exist > 0){

            $brand = Brand::select("*")
                ->where('label', 'like', $request->label)
                ->first();

        } else{
            $code = strtolower(str_replace(' ', '', $request->label));

            if(Brand::where('code', $code)->exists()){
                $code = $code . '-' . now()->timestamp;
            }

            $brand = Brand::create([
                'code' => $code,
                'label' => $request->label,
                'description' => $request->description,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('Brand created successfully', new BrandResource($brand));
    }

    /**
     * Afficher une marque
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $brand = Brand::findOrFail($id);

        return $this->responseSuccess(null, new BrandResource($brand));
    }

    /**
     * Mettre à jour une marque
     *
     * @authenticated
     */
    public function update(UpdateBrandRequest $request, $id): JsonResponse
    {
        $brand = Brand::findOrFail($id);

        $brand->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Brand updated Successfully', new BrandResource($brand));
    }

    /**
     * Supprimer une marque
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $brand = Brand::findOrFail($id);

        // $brand->delete();

        return $this->responseDeleted();
    }

   
}
