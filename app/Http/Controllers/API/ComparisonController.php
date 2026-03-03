<?php

namespace App\Http\Controllers\API;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comparison\CreateComparisonRequest;
use App\Http\Requests\Comparison\UpdateComparisonRequest;
use App\Http\Resources\Comparison\ComparisonResource;
use App\Models\Comparison;
use App\Models\Status;
use Carbon\Carbon;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des comparaisons
 *
 * APIs pour la gestion des comparaisons
 */
class ComparisonController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
    }

    /**
     * Lister toutes les comparaisons
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $comparisons = Comparison::with(['assignment', 'status'])
            ->accessibleBy(auth()->user())
            ->latest('created_at')
            ->useFilters()
            ->dynamicPaginate();

        return ComparisonResource::collection($comparisons);
    }

    /**
     * Créer une comparaison
     *
     * @authenticated
     */
    public function store(CreateComparisonRequest $request): JsonResponse
    {
        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;
        $reference = 'COMP_'.$today;

        $comparison = Comparison::create([
            'reference' => $reference,
            'assignment_id' => $request->assignment_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('Comparison created successfully', new ComparisonResource($comparison->load(['assignment', 'status'])));
    }

    /**
     * Afficher une comparaison
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $comparison = Comparison::accessibleBy(auth()->user())->with('assignment', 'status', 'offers')->findOrFail(Comparison::keyFromHashId($id));

        return $this->responseSuccess(null, new ComparisonResource($comparison));
    }

    /**
     * Mettre à jour une comparaison
     *
     * @authenticated
     */
    public function update(UpdateComparisonRequest $request, $id): JsonResponse
    {
        $comparison = Comparison::accessibleBy(auth()->user())->findOrFail(Comparison::keyFromHashId($id));

        return $this->responseSuccess('Comparison updated successfully', new ComparisonResource($comparison->load(['assignment', 'status', 'offers'])));
    }

    /**
     * Supprimer une comparaison
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $comparison = Comparison::accessibleBy(auth()->user())->findOrFail(Comparison::keyFromHashId($id));
        $comparison->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => Carbon::now(),
        ]);
        $comparison->delete();

        return $this->responseSuccess('Comparison deleted successfully', null);
    }
}
