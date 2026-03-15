<?php

namespace App\Http\Controllers\API;

use App\Enums\AssignmentTypeEnum;
use App\Enums\ExpertiseTypeEnum;
use App\Enums\NumberPaintElementEnum;
use App\Enums\PaintTypeEnum;
use App\Enums\StatusEnum;
use App\Enums\WorkforceTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\CreateOfferRequest;
use App\Http\Requests\Offer\UpdateOfferRequest;
use App\Http\Resources\Offer\OfferResource;
use App\Models\AssignmentType;
use App\Models\Comparison;
use App\Models\Entity;
use App\Models\ExpertiseType;
use App\Models\HourlyRate;
use App\Models\NumberPaintElement;
use App\Models\Offer;
use App\Models\OfferShock;
use App\Models\OfferShockWork;
use App\Models\OfferWorkforce;
use App\Models\PaintingPrice;
use App\Models\PaintProductPrice;
use App\Models\PaintType;
use App\Models\Shock;
use App\Models\ShockWork;
use App\Models\Status;
use App\Models\Workforce;
use App\Models\WorkforceType;
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
        // if (Offer::accessibleBy(auth()->user())->where('comparison_id', $request->comparison_id)->exists()) {
        //     return $this->responseUnprocessable('Une offre existe déjà pour cette comparaison.');
        // }

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

        $this->migrateShocks($offer->id);

        return $this->responseCreated('Offre créée avec succès', new OfferResource($offer->load(['comparison', 'repairer', 'status'])));
    }

    public function migrateShocks($id): JsonResponse
    {
        $offer = Offer::with(['comparison', 'comparison.assignment'])->accessibleBy(auth()->user())
            ->where('offers.id', $id)
            ->firstOrFail();

        $assignment = $offer->comparison->assignment;

        $shocks = Shock::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->get();

        if(count($shocks) > 0){
            $shock_position = 1;
            foreach ($shocks as $data) {
                $shock = OfferShock::create([
                    'offer_id' => $offer->id,
                    'shock_point_id' => $data->shock_point_id,
                    'paint_type_id' => $data->paint_type_id ?? PaintType::where('code', PaintTypeEnum::ORDINARY)->first()->id,
                    'hourly_rate_id' => $data->hourly_rate_id,
                    'with_tax' => $data->with_tax,
                    // 'position' => $shock_position,
                    'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);

                $shock_works = ShockWork::where('shock_id', $data->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->get();
                if(count($shock_works) > 0){
                    $shock_work_position = 1;
                    
                    foreach ($data->shock_works as $item) {
                        $discount = $item->discount;
                        $discount_amount_excluding_tax = ceil(($item->discount * $item->amount) / 100);
                        $discount_amount_tax = ceil((config('services.settings.tax_rate') * $discount_amount_excluding_tax) / 100);
                        $discount_amount = ceil($discount_amount_excluding_tax + $discount_amount_tax);

                        $obsolescence_rate = $item->obsolescence_rate;
                        $obsolescence_amount_excluding_tax = ceil(($item->obsolescence_rate * ($item->amount - $discount_amount_excluding_tax)) / 100);
                        $obsolescence_amount_tax = ceil((config('services.settings.tax_rate') * $obsolescence_amount_excluding_tax) / 100);
                        $obsolescence_amount = ceil($obsolescence_amount_excluding_tax + $obsolescence_amount_tax);
        
                        $recovery_amount = $item->recovery_amount;
                        $recovery_amount_excluding_tax = ceil(($item->recovery_amount * $item->amount) / 100);
                        $recovery_amount_tax = 0;
                        $recovery_amount = ceil($recovery_amount_excluding_tax + $recovery_amount_tax);
        
                        $new_amount_excluding_tax = ceil($item->amount - ($obsolescence_amount_excluding_tax + $discount_amount_excluding_tax));
                        if($assignment->expertise_type_id == ExpertiseType::where('code', ExpertiseTypeEnum::EVALUATION)->first()->id || $assignment->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::EVALUATION)->first()->id){
                            $new_amount_tax = 0;
                        } else {
                            $new_amount_tax = ceil((config('services.settings.tax_rate') * $new_amount_excluding_tax) / 100);
                        }                        
                        $new_amount = ceil($new_amount_excluding_tax + $new_amount_tax);
                        
                        $shockWork = OfferShockWork::create([
                            'shock_id' => $shock->id,
                            'supply_id' => $item->supply_id,
                            'old_supply_id' => null,
                            'disassembly' => $item->disassembly,
                            'old_disassembly' => $item->disassembly,
                            'replacement' => $item->replacement,
                            'old_replacement' => $item->replacement,
                            'repair' => $item->repair,
                            'paint' => $item->paint,
                            'old_paint' => $item['paint'],
                            'control' => $item->control,
                            'old_control' => $item->control,
                            'obsolescence' => $item->obsolescence,
                            'old_obsolescence' => $item->obsolescence,
                            'old_control' => $item->control,
                            'in_order' => $item->in_order,
                            'old_in_order' => $item->in_order,
                            'comment' => $item->comment,
                            'old_comment' => $item->comment,
                            // 'position' => $shock_work_position,
                            'is_before_quote' => $item->is_before_quote,
                            'quote_validated' => $item->quote_validated,
                            'obsolescence_rate' => $obsolescence_rate,
                            'old_obsolescence_rate' => $obsolescence_rate,
                            'obsolescence_amount_excluding_tax' => $obsolescence_amount_excluding_tax,
                            'old_obsolescence_amount_excluding_tax' => $obsolescence_amount_excluding_tax,
                            'obsolescence_amount_tax' => $obsolescence_amount_tax,
                            'old_obsolescence_amount_tax' => $obsolescence_amount_tax,
                            'obsolescence_amount' => $obsolescence_amount,
                            'old_obsolescence_amount' => $obsolescence_amount,
                            'recovery_amount' => $recovery_amount,
                            'old_recovery_amount' => $recovery_amount,
                            'recovery_amount_excluding_tax' => $recovery_amount_excluding_tax,
                            'old_recovery_amount_excluding_tax' => $recovery_amount_excluding_tax,
                            'recovery_amount_tax' => $recovery_amount_tax,
                            'old_recovery_amount_tax' => $recovery_amount_tax,
                            'recovery_amount' => $recovery_amount,
                            'old_recovery_amount' => $recovery_amount,
                            'discount' => $discount,
                            'old_discount' => $discount,
                            'discount_amount_excluding_tax' => $discount_amount_excluding_tax,
                            'old_discount_amount_excluding_tax' => $discount_amount_excluding_tax,
                            'discount_amount_tax' => $discount_amount_tax,
                            'old_discount_amount_tax' => $discount_amount_tax,
                            'discount_amount' => $discount_amount,
                            'new_amount_excluding_tax' => $new_amount_excluding_tax,
                            'old_new_amount_excluding_tax' => $new_amount_excluding_tax,
                            'new_amount_tax' => $new_amount_tax,
                            'old_new_amount_tax' => $new_amount_tax,
                            'new_amount' => $new_amount,
                            'old_new_amount' => $new_amount,
                            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                            'created_by' => auth()->user()->id,
                            'updated_by' => auth()->user()->id,
                        ]);
                        $shock_work_position++;
                    }
        
                }

                $nb_paint = OfferShockWork::where(['offer_shock_id' => $shock->id, 'paint' => 1])->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('paint');
                $all_paint = false;
    
                $workforces = Workforce::where('shock_id', $data->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->get();
                if(count($workforces) > 0){
                    $workforce_position = 1;
                    foreach ($data->workforces as $item) {
                        if($item->workforce_type_id == WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id){
                            $hourlyRateId = $data->hourly_rate_id ?? null;
                            $paintTypeId = $data->paint_type_id ?? null;
                            
                            if($hourlyRateId && $paintTypeId){
                                if($nb_paint == 1){
                                    $painting_price = PaintingPrice::where(['hourly_rate_id' => $hourlyRateId, 'paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                                } elseif($nb_paint == 2){
                                    $painting_price = PaintingPrice::where(['hourly_rate_id' => $hourlyRateId, 'paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                                } else {
                                    $painting_price = PaintingPrice::where(['hourly_rate_id' => $hourlyRateId, 'paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                                } 
                                
                                if (($item->all_paint ?? false) == true) {
                                    $all_paint = true;
                                    $painting_price = PaintingPrice::where(['hourly_rate_id' => $hourlyRateId, 'paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                                }
                            } else {
                                $painting_price = null;
                            }
        
                            $total = $painting_price ? $item->nb_hours * $painting_price->param_1 + $painting_price->param_2 : 0;
                            
                        } else {
                            $hourlyRateValue = $hourlyRateId ? HourlyRate::where(['id' => $hourlyRateId, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value : 0;
                            $total = $item->nb_hours * ($hourlyRateValue ?? 0);
                        }

                        $amount_excluding_tax = ceil($total - ($total * $item->discount / 100));
                        if(!($data->with_tax ?? false)){
                            $amount_tax = 0;
                        } else {
                            $amount_tax = ceil((config('services.settings.tax_rate') * $amount_excluding_tax) / 100);
                        }
                        $amount = ceil($amount_excluding_tax + $amount_tax);
            
                        $workFeeValue = $hourlyRateId ? HourlyRate::where(['id' => $hourlyRateId, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value : 0;
                        $workforce = OfferWorkforce::create([
                            'shock_id' => $shock->id,
                            'workforce_type_id' => $item->workforce_type_id,
                            'old_workforce_type_id' => $item['workforce_type_id'],
                            'nb_hours' => $item->nb_hours,
                            'old_nb_hours' => $item->nb_hours,
                            'work_fee' => ceil($workFeeValue ?? 0),
                            'old_work_fee' => ceil($workFeeValue ?? 0),
                            'discount' => $item->discount,
                            'old_discount' => $item->discount,
                            'amount_excluding_tax' => $amount_excluding_tax,
                            'old_amount_excluding_tax' => $amount_excluding_tax,
                            'amount_tax' => $amount_tax,
                            'old_amount_tax' => $amount_tax,
                            'amount' => $amount,
                            'old_amount' => $amount,
                            // 'position' => $workforce_position,
                            'is_before_quote' => $item->is_before_quote,
                            'quote_validated' => $item->quote_validated,
                            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                            'created_by' => auth()->user()->id,
                            'updated_by' => auth()->user()->id,
                        ]);
                        $workforce_position++;
                    }
                }

                $total_in_order_amount_excluding_tax = OfferShockWork::where('offer_shock_id', $shock->id)->where('in_order', true)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount_excluding_tax');
                $total_in_order_amount_tax = OfferShockWork::where('offer_shock_id', $shock->id)->where('in_order', true)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount_tax');
                $total_in_order_amount = OfferShockWork::where('offer_shock_id', $shock->id)->where('in_order', true)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount');
    
                $total_obsolescence_amount_excluding_tax = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('obsolescence_amount_excluding_tax');
                $total_obsolescence_amount_tax = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('obsolescence_amount_tax');
                $total_obsolescence_amount = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('obsolescence_amount');
    
                $total_recovery_amount_excluding_tax = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('recovery_amount_excluding_tax');
                $total_recovery_amount_tax = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('recovery_amount_tax');
                $total_recovery_amount = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('recovery_amount');

                $total_discount_amount_excluding_tax = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('discount_amount_excluding_tax');
                $total_discount_amount_tax = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('discount_amount_tax');
                $total_discount_amount = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('discount_amount');
    
                $total_new_amount_excluding_tax = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount_excluding_tax');
                $total_new_amount_tax = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount_tax');
                $total_new_amount = OfferShockWork::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount');
    
                $total_workforce_amount_excluding_tax = OfferWorkforce::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax');
                $total_workforce_amount_tax = OfferWorkforce::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax');
                $total_workforce_amount = OfferWorkforce::where('offer_shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount');
    
                $paint_product_price = 0;
                $paintTypeId = $data->paint_type_id ?? null;
                
                if($paintTypeId){
                    if($nb_paint == 1){
                        $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value ?? 0;
                    } elseif($nb_paint == 2){
                        $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value ?? 0;
                    } elseif($nb_paint >= 3) {
                        $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value ?? 0;
                    } 
                    
                    $all_paint_workforce = OfferWorkforce::where(['offer_shock_id' => $shock->id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
            
                    if ($all_paint_workforce && $all_paint_workforce->all_paint == true) {
                        $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value ?? 0;
                    }
                }
    
                $total_paint_product_amount_excluding_tax = ceil($paint_product_price * OfferWorkforce::where(['offer_shock_id' => $shock->id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->sum('nb_hours'));
                $total_paint_product_amount_tax = ceil((config('services.settings.tax_rate') * $total_paint_product_amount_excluding_tax) / 100);
                $total_paint_product_amount = ceil($total_paint_product_amount_excluding_tax + $total_paint_product_amount_tax);
    
                $total_small_supply_amount_excluding_tax = ceil(($total_new_amount_excluding_tax + $total_workforce_amount_excluding_tax + $total_paint_product_amount_excluding_tax + $total_recovery_amount_excluding_tax) * (config('services.settings.small_supply_rate') / 100));
                $total_small_supply_amount_tax = ceil((config('services.settings.tax_rate') * $total_small_supply_amount_excluding_tax) / 100);
                $total_small_supply_amount = ceil($total_small_supply_amount_excluding_tax + $total_small_supply_amount_tax);
    
                $shock->update([
                    'shock_work_in_order_amount_excluding_tax' => ceil($total_in_order_amount_excluding_tax),
                    'shock_work_in_order_amount_tax' => ceil($total_in_order_amount_tax),
                    'shock_work_in_order_amount' => ceil($total_in_order_amount),
                    'shock_work_obsolescence_amount_excluding_tax' => ceil($total_obsolescence_amount_excluding_tax),
                    'shock_work_obsolescence_amount_tax' => ceil($total_obsolescence_amount_tax),
                    'shock_work_obsolescence_amount' => ceil($total_obsolescence_amount),
                    'shock_work_recovery_amount_excluding_tax' => ceil($total_recovery_amount_excluding_tax),
                    'shock_work_recovery_amount_tax' => ceil($total_recovery_amount_tax), 
                    'shock_work_recovery_amount' => ceil($total_recovery_amount),
                    'shock_work_discount_amount_excluding_tax' => ceil($total_discount_amount_excluding_tax),
                    'shock_work_discount_amount_tax' => ceil($total_discount_amount_tax),
                    'shock_work_discount_amount' => ceil($total_discount_amount),
                    'shock_work_new_amount_excluding_tax' => ceil($total_new_amount_excluding_tax),
                    'shock_work_new_amount_tax' => ceil($total_new_amount_tax),
                    'shock_work_new_amount' => ceil($total_new_amount),
                    'workforce_amount_excluding_tax' => ceil($total_workforce_amount_excluding_tax),
                    'workforce_amount_tax' => ceil($total_workforce_amount_tax),
                    'workforce_amount' => ceil($total_workforce_amount),
                    'paint_product_amount_excluding_tax' => ceil($total_paint_product_amount_excluding_tax),
                    'paint_product_amount_tax' => ceil($total_paint_product_amount_tax),
                    'paint_product_amount' => ceil($total_paint_product_amount),
                    'small_supply_amount_excluding_tax' => ceil($total_small_supply_amount_excluding_tax),
                    'small_supply_amount_tax' => ceil($total_small_supply_amount_tax),
                    'small_supply_amount' => ceil($total_small_supply_amount),
                    'amount_excluding_tax' => ceil($total_new_amount_excluding_tax + $total_workforce_amount_excluding_tax + $total_paint_product_amount_excluding_tax + $total_small_supply_amount_excluding_tax + $total_recovery_amount_excluding_tax),
                    'amount_tax' => ceil($total_new_amount_tax + $total_workforce_amount_tax + $total_paint_product_amount_tax + $total_small_supply_amount_tax + $total_recovery_amount_tax),
                    'amount' => ceil($total_new_amount + $total_workforce_amount + $total_paint_product_amount + $total_small_supply_amount + $total_recovery_amount),
                ]);
                $shock_position++;
            }

        }

        $total_shock_amount_excluding_tax = ceil(OfferShock::where('offer_id', $offer->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax'));
        $total_shock_amount_tax = ceil(OfferShock::where('offer_id', $offer->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax'));
        $total_shock_amount = ceil(OfferShock::where('offer_id', $offer->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount'));

        $offer->update([
            'shock_amount_excluding_tax' => $total_shock_amount_excluding_tax,
            'shock_amount_tax' => $total_shock_amount_tax,
            'shock_amount' => $total_shock_amount,
        ]);

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
            'status_id' => Status::where('code', StatusEnum::CLOSED)->first()->id,
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
