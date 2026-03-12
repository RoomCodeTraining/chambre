<?php

namespace App\Http\Controllers\API;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\CreateOfferRequest;
use App\Http\Requests\Offer\UpdateOfferRequest;
use App\Http\Resources\Offer\OfferResource;
use App\Models\Comparison;
use App\Models\Entity;
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
            ->when(request()->filled('comparison_id'), function ($query) {
                $query->where('comparison_id', Comparison::keyFromHashId(request()->comparison_id));
            })
            ->when(request()->filled('repairer_id'), function ($query) {
                $query->where('repairer_id', Entity::keyFromHashId(request()->repairer_id));
            })
            ->when(request()->filled('status_id'), function ($query) {
                $query->where('status_id', Status::where('code', request()->status_id)->first()->id);
            })
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
            'status_id' => Status::where('code', StatusEnum::DRAFT)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('Offre créée avec succès', new OfferResource($offer->load(['comparison', 'repairer', 'status'])));
    }

    /**
     * Afficher une offre
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $offer = Offer::accessibleBy(auth()->user())->with(['comparison', 'comparison.assignment', 'comparison.assignment.expertFirm', 'comparison.assignment.insurer', 'repairer', 'status', 'offerShocks', 'offerShocks.shockPoint', 'offerShocks.paintType', 'offerShocks.hourlyRate', 'offerShocks.status', 'offerShocks.offerShockWorks', 'offerShocks.offerShockWorks.supply', 'offerShocks.offerShockWorks.workforceType', 'offerShocks.offerWorkforces', 'offerShocks.offerWorkforces.workforceType'])->findOrFail(Offer::keyFromHashId($id));

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

        return $this->responseSuccess('Offre mise à jour avec succès', new OfferResource($offer));
    }

    /**
     * Envoyer une offre
     *
     * @authenticated
     */
    public function send($id): JsonResponse
    {
        $offer = Offer::accessibleBy(auth()->user())->with(['comparison', 'comparison.assignment', 'comparison.assignment.expertFirm', 'comparison.assignment.insurer', 'repairer', 'status', 'offerShocks'])->findOrFail(Offer::keyFromHashId($id));

        $offer->update([
            'status_id' => Status::where('code', StatusEnum::PENDING)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Offre envoyée avec succès', new OfferResource($offer));
    }

    /**
     * Accepter une offre
     *
     * @authenticated
     */
    public function accept($id): JsonResponse
    {
        $offer = Offer::accessibleBy(auth()->user())->with(['comparison', 'comparison.assignment', 'comparison.assignment.expertFirm', 'comparison.assignment.insurer', 'repairer', 'status', 'offerShocks'])->findOrFail(Offer::keyFromHashId($id));

        Offer::accessibleBy(auth()->user())->with(['comparison', 'comparison.assignment', 'comparison.assignment.expertFirm', 'comparison.assignment.insurer', 'repairer', 'status', 'offerShocks'])
                ->where('comparison_id',$offer->comparison_id)
                ->where('id','!=',$offer->id)
                ->update([
                    'status_id' => Status::where('code', StatusEnum::REJECTED)->first()->id,
                ]);

        $offer->update([
            'status_id' => Status::where('code', StatusEnum::ACCEPTED)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        $offer->comparison->update([
            'status_id' => Status::where('code', StatusEnum::IN_PROGRESS)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        $offer->comparison->assignment->update([
            'is_in_comparison' => false,
        ]);

        return $this->responseSuccess('Offre acceptée avec succès', new OfferResource($offer));
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
