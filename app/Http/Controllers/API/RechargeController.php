<?php

namespace App\Http\Controllers\API;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Recharge\CreateRechargeRequest;
use App\Http\Requests\Recharge\UpdateRechargeRequest;
use App\Http\Resources\Recharge\RechargeResource;
use App\Models\Entity;
use App\Models\PaymentMethod;
use App\Models\Recharge;
use App\Models\Status;
use App\Services\Wave\WaveCheckoutService;
use Carbon\Carbon;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des chargements
 *
 * APIs pour la gestion des chargements
 */
class RechargeController extends Controller
{
    use ApiResponse;
    
    public function __construct()
    {

    }

    /**
     * Lister tous les chargements
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $recharges = Recharge::with('entity', 'paymentMethod', 'status', 'createdBy', 'updatedBy', 'deletedBy')
            ->accessibleBy(auth()->user())
            ->when(request()->filled('entity_id'), function ($query) {
                $query->where('entity_id', Entity::keyFromHashId(request()->entity_id));
            })
            ->when(request()->filled('payment_method_id'), function ($query) {
                $query->where('payment_method_id', PaymentMethod::keyFromHashId(request()->payment_method_id));
            })
            ->when(request()->filled('status_code'), function ($query) {
                $query->where('status_id', Status::where('code', request()->status_code)->first()->id);
            })
            ->useFilters()
            ->latest('created_at')
            ->dynamicPaginate();

        return RechargeResource::collection($recharges);
    }

    /**
     * Créer un rechargement
     *
     * @authenticated
     */
    public function store(CreateRechargeRequest $request): JsonResponse
    {
        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;
        $reference = 'REF_'.$today;

        $recharge = Recharge::create([
            'reference' => $reference,
            'entity_id' => auth()->user()->entity_id,
            'amount' => $request->amount,
            'user_first_name' => $request->user_first_name,
            'user_last_name' => $request->user_last_name,
            'user_phone_number' => $request->user_phone_number,
            'payment_method_id' => $request->payment_method_id,
            'status_id' => Status::where('code', StatusEnum::PENDING)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        $waveCheckoutService = new WaveCheckoutService();
        $response = $waveCheckoutService->createCheckoutSession($request->amount, $recharge->reference);

        if($response->successful()) {
            $waveCheckoutSession = $waveCheckoutService->searchCheckoutSessions($recharge->reference);
            if($waveCheckoutSession->successful()) {
                $recharge->update([
                    'payment_link' => $waveCheckoutSession['result'][0]['wave_launch_url'],
                ]);
            } else {
                return $this->responseUnprocessable('Erreur lors de la recherche de la session de paiement', $waveCheckoutSession->json());
            }
        } else {
            return $this->responseUnprocessable('Erreur lors de la création de la session de paiement', $response->json());
        }

        return $this->responseCreated('Rechargement créé avec succès', new RechargeResource($recharge));
    }

    /**
     * Afficher un rechargement
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $recharge = Recharge::with('entity', 'paymentMethod', 'status', 'createdBy', 'updatedBy', 'deletedBy')
            ->accessibleBy(auth()->user())
            ->where('recharges.id', Recharge::keyFromHashId($id))
            ->firstOrFail();

        return $this->responseSuccess(null, new RechargeResource($recharge));
    }


    /**
     * Mettre à jour le statut des rechargements
     *
     * @authenticated
     */
    public function changeStatus(): JsonResponse
    {
        $recharges = Recharge::accessibleBy(auth()->user())
                        ->where('recharges.status_id', Status::where('code', StatusEnum::PENDING)->first()->id)
                        ->get();
        foreach($recharges as $recharge) {
            $waveCheckoutService = new WaveCheckoutService();
            $response = $waveCheckoutService->searchCheckoutSessions($recharge->reference);
            if($response->successful()) {
                $waveCheckoutSession = $waveCheckoutService->searchCheckoutSessions($recharge->reference);
                if($waveCheckoutSession->successful()) {
                    if($waveCheckoutSession['result'][0]['checkout_status'] == 'completed' && $waveCheckoutSession['result'][0]['payment_status'] == 'succeeded') {
                        $recharge->status_id = Status::where('code', StatusEnum::SUCCESS)->first()->id;
                        $recharge->updated_by = auth()->user()->id;
                        $recharge->save();
                    } else {
                        $recharge->status_id = Status::where('code', StatusEnum::FAILED)->first()->id;
                        $recharge->updated_by = auth()->user()->id;
                        $recharge->save();
                    }
                }
            } else {
                return $this->responseUnprocessable('Erreur lors de la recherche de la session de paiement', $response->json());
            }
        }

        return $this->responseSuccess('Statut des rechargements mis à jour avec succès', new RechargeResource($recharges));
    }

   
}
