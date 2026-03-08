<?php

namespace App\Http\Controllers\API;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\CreateOfferRequest;
use App\Http\Requests\Offer\UpdateOfferRequest;
use App\Http\Resources\Offer\OfferResource;
use App\Models\Offer;
use App\Models\Status;
use Carbon\Carbon;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des offres
 *
 * APIs pour la gestion des offres
 */
class OfferController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
    }

    /**
     * Lister toutes les offres
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $offers = Offer::with(['comparison', 'comparison.assignment', 'comparison.assignment.expertFirm', 'comparison.assignment.insurer', 'repairer', 'status'])
            ->accessibleBy(auth()->user())
            ->latest('created_at')
            ->useFilters()
            ->dynamicPaginate();

        return OfferResource::collection($offers);
    }

    /**
     * Créer une offre
     *
     * @authenticated
     */
    public function store(CreateOfferRequest $request): JsonResponse
    {
        if (Offer::accessibleBy(auth()->user())->where('comparison_id', $request->comparison_id)->exists()) {
            return $this->responseUnprocessable('Une offre existe déjà pour cette comparaison.');
        }

        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;
        $reference = 'OFF_'.$today;

        $offer = Offer::create([
            'reference' => $reference,
            'comparison_id' => $request->comparison_id,
            'repairer_id' => auth()->user()->entity_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('Offer created successfully', new OfferResource($offer->load(['comparison', 'repairer', 'status'])));
    }

    /**
     * Afficher une offre
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $offer = Offer::accessibleBy(auth()->user())->with(['comparison', 'comparison.assignment', 'comparison.assignment.expertFirm', 'comparison.assignment.insurer', 'repairer', 'status', 'offerShocks'])->findOrFail(Offer::keyFromHashId($id));

        return $this->responseSuccess(null, new OfferResource($offer));
    }

    /**
     * Mettre à jour une offre
     *
     * @authenticated
     */
    public function update(UpdateOfferRequest $request, $id): JsonResponse
    {
        $offer = Offer::accessibleBy(auth()->user())->with(['comparison', 'comparison.assignment', 'comparison.assignment.expertFirm', 'comparison.assignment.insurer', 'repairer', 'status', 'offerShocks'])->findOrFail(Offer::keyFromHashId($id));

        return $this->responseSuccess('Offer updated successfully', new OfferResource($offer));
    }

    /**
     * Supprimer une offre
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $offer = Offer::accessibleBy(auth()->user())->with(['comparison', 'comparison.assignment', 'comparison.assignment.expertFirm', 'comparison.assignment.insurer', 'repairer', 'status', 'offerShocks'])->findOrFail(Offer::keyFromHashId($id));
        $offer->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => Carbon::now(),
        ]);
        $offer->delete();

        return $this->responseSuccess('Offer deleted successfully', null);
    }
}
