<?php

namespace App\Http\Controllers\API;

use App\Models\Color;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\Color\ColorResource;
use App\Http\Requests\Color\CreateColorRequest;
use App\Http\Requests\Color\UpdateColorRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des couleurs
 *
 * APIs pour la gestion des couleurs
 */
class ColorController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    /**
     * Lister toutes les couleurs
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $colors = Color::with('status')->useFilters()->latest('created_at')->dynamicPaginate();

        return ColorResource::collection($colors);
    }

    /**
     * Ajouter une couleur
     *
     * @authenticated
     */
    public function store(CreateColorRequest $request): JsonResponse
    {
        $exist = Color::select("*")
            ->where('label', 'like', $request->label)
            ->count();  

        if($exist > 0){

            $color = Color::select("*")
                ->where('label', 'like', $request->label)
                ->first();  

        } else{
            $code = strtolower(str_replace(' ', '', $request->label));
            $color = Color::create([
                'code' => $code,
                'label' => $request->label,
                'description' => $request->description,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('Color created successfully', new ColorResource($color));
    }

    /**
     * Afficher une couleur
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $color = Color::findOrFail($id);

        return $this->responseSuccess(null, new ColorResource($color));
    }

    /**
     * Mettre à jour une couleur
     *
     * @authenticated
     */
    public function update(UpdateColorRequest $request, $id): JsonResponse
    {
        $color = Color::findOrFail($id);

        $color->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Color updated Successfully', new ColorResource($color));
    }

    /**
     * Supprimer une couleur
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $color = Color::findOrFail($id);

        // $color->delete();

        return $this->responseDeleted();
    }

   
}
