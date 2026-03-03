<?php

namespace App\Http\Controllers\API;

use App\Enums\AssignmentTypeEnum;
use App\Enums\EntityTypeEnum;
use App\Enums\ExpertiseTypeEnum;
use App\Enums\NumberPaintElementEnum;
use App\Enums\StatusEnum;
use App\Enums\WorkforceTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Workforce\CalculateWorkforceRequest;
use App\Http\Requests\Workforce\CreateWorkforceRequest;
use App\Http\Requests\Workforce\UpdateWorkforceRequest;
use App\Http\Resources\Workforce\WorkforceResource;
use App\Jobs\GenerateExpertiseReportPdfJob;
use App\Models\Assignment;
use App\Models\AssignmentType;
use App\Models\Entity;
use App\Models\ExpertiseType;
use App\Models\HourlyRate;
use App\Models\NumberPaintElement;
use App\Models\Offer;
use App\Models\OfferShock;
use App\Models\OfferShockWork;
use App\Models\OfferWorkforce;
use App\Models\OtherCost;
use App\Models\PaintingPrice;
use App\Models\PaintProductPrice;
use App\Models\Shock;
use App\Models\ShockWork;
use App\Models\Status;
use App\Models\Workforce;
use App\Models\WorkforceType;
use App\Services\Receipt\UpdateReceiptService;
use App\Services\WorkDuration\WorkDurationService;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des main-d'œuvre d'un choc d'offre
 *
 * APIs pour la gestion des main-d'œuvre d'un choc d'offre
 */
class OfferWorkforceController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les main-d'œuvre de choc d'offre
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $offerWorkforces = OfferWorkforce::select('offer_workforces.*')
                    ->with('workforceType', 'oldWorkforceType', 'status')
                    ->join('offer_shocks', 'offer_workforces.offer_shock_id', '=', 'offer_shocks.id')
                    ->accessibleBy(auth()->user())
                    ->useFilters()
                    ->orderBy('position', 'asc')
                    ->dynamicPaginate();

        return WorkforceResource::collection($offerWorkforces);
    }

    /**
     * Calculer les mains-d'œuvres de choc d'offre
     *
     * @authenticated
     */
    public function calculate(CalculateWorkforceRequest $request): JsonResponse
    {
        $offerShock = OfferShock::findOrFail($request->offer_shock_id);
        $offer = Offer::accessibleBy(auth()->user())
            ->where('offers.id', $offerShock->offer_id)
            ->firstOrFail();

        $shock_works = [];
        $obsolescence_amount_excluding_tax = 0;
        $obsolescence_amount_tax = 0;
        $obsolescence_amount = 0;
        $recovery_amount_excluding_tax = 0;
        $recovery_amount_tax = 0;
        $recovery_amount = 0;
        $new_amount_excluding_tax = 0;
        $new_amount_tax = 0;
        $new_amount = 0;
        $total_obsolescence_amount_excluding_tax = 0;
        $total_obsolescence_amount_tax = 0;
        $total_obsolescence_amount = 0;
        $total_recovery_amount_excluding_tax = 0;
        $total_recovery_amount_tax = 0;
        $total_recovery_amount = 0;
        $total_new_amount_excluding_tax = 0;
        $total_new_amount_tax = 0;
        $total_new_amount = 0;

        $nb_paint = 0;

        $shockWorks = $request->get('shock_works');

        foreach ($shockWorks as $item) {
            $discount = $item['discount'];
            $discount_amount_excluding_tax = ceil(($item['discount'] * $item['amount']) / 100);
            $discount_amount_tax = ceil((config('services.settings.tax_rate') * $discount_amount_excluding_tax) / 100);
            $discount_amount = ceil($discount_amount_excluding_tax + $discount_amount_tax);
            
            $obsolescence_rate = $item['obsolescence_rate'];
            $obsolescence_amount_excluding_tax = ceil(($item['obsolescence_rate'] * ($item['amount'] - $discount_amount_excluding_tax)) / 100);
            $obsolescence_amount_tax = ceil((config('services.settings.tax_rate') * $obsolescence_amount_excluding_tax) / 100);
            $obsolescence_amount = ceil($obsolescence_amount_excluding_tax + $obsolescence_amount_tax);

            $recovery_amount = $item['recovery_amount'];
            $recovery_amount_excluding_tax = ceil($item['recovery_amount']);
            $recovery_amount_tax = 0;
            $recovery_amount = ceil($recovery_amount_excluding_tax + $recovery_amount_tax);

            $new_amount_excluding_tax = ceil($item['amount'] - ($obsolescence_amount_excluding_tax + $discount_amount_excluding_tax));
            if($assignment->expertise_type_id == ExpertiseType::where('code', ExpertiseTypeEnum::EVALUATION)->first()->id || $assignment->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::EVALUATION)->first()->id){
                $new_amount_tax = 0;
            } else {
                $new_amount_tax = ceil((config('services.settings.tax_rate') * $new_amount_excluding_tax) / 100);
            }
            $new_amount = ceil($new_amount_excluding_tax + $new_amount_tax);

            $shock_works[] = [
                'obsolescence_rate' => $obsolescence_rate,
                'obsolescence_amount_excluding_tax' => $obsolescence_amount_excluding_tax,
                'obsolescence_amount_tax' => $obsolescence_amount_tax,
                'obsolescence_amount' => $obsolescence_amount,
                'recovery_amount' => $recovery_amount,
                'recovery_amount_excluding_tax' => $recovery_amount_excluding_tax,
                'recovery_amount_tax' => $recovery_amount_tax,
                'recovery_amount' => $recovery_amount,
                'discount' => $discount,
                'discount_amount_excluding_tax' => $discount_amount_excluding_tax,
                'discount_amount_tax' => $discount_amount_tax,
                'discount_amount' => $discount_amount,
                'new_amount_excluding_tax' => $new_amount_excluding_tax,
                'new_amount_tax' => $new_amount_tax,
                'new_amount' => $new_amount,
            ];

            if($item['paint'] == true){
                $nb_paint += 1;
            }

            $total_obsolescence_amount_excluding_tax += $obsolescence_amount_excluding_tax;
            $total_obsolescence_amount_tax += $obsolescence_amount_tax;
            $total_obsolescence_amount += $obsolescence_amount;
            $total_recovery_amount_excluding_tax += $recovery_amount_excluding_tax;
            $total_recovery_amount_tax += $recovery_amount_tax;
            $total_recovery_amount += $recovery_amount;
            $total_discount_amount_excluding_tax += $discount_amount_excluding_tax;
            $total_discount_amount_tax += $discount_amount_tax;
            $total_discount_amount += $discount_amount;
            $total_new_amount_excluding_tax += $new_amount_excluding_tax;
            $total_new_amount_tax += $new_amount_tax;
            $total_new_amount += $new_amount;
        }

        $workforces = [];
        $total_workforce_amount_excluding_tax = 0;
        $total_workforce_amount_tax = 0;
        $total_workforce_amount = 0;
        $workforce_amount_excluding_tax = 0;
        $workforce_amount_tax = 0;
        $workforce_amount = 0;

        $nb_hours_paint_product = 0;
        $all_paint = false;
        $workforces = $request->get('workforces');

        foreach ($workforces as $item) {
            if($item['workforce_type_id'] == WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id){
                if($nb_paint == 0){
                    $total = 0;
                } elseif($nb_paint == 1){
                    $painting_price = PaintingPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    $nb_hours_paint_product += $item['nb_hours'];
                } elseif($nb_paint == 2){
                    $painting_price = PaintingPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    $nb_hours_paint_product += $item['nb_hours'];
                } else {
                    $painting_price = PaintingPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    $nb_hours_paint_product += $item['nb_hours'];
                } 
                
                if ($item['all_paint'] == true) {
                    $all_paint = true;
                    $painting_price = PaintingPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    $nb_hours_paint_product += $item['nb_hours'];
                }

                $total = $painting_price ? $item['nb_hours'] * $painting_price->param_1 + $painting_price->param_2 : 0;
            } else {
                $total = $item['nb_hours'] * HourlyRate::where(['id' => $request->hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value;
            }

            $amount_excluding_tax = ceil($total - ($total * $item['discount'] / 100));
            if($request->with_tax == false){
                $amount_tax = 0;
            } else {
                $amount_tax = ceil((config('services.settings.tax_rate') * $amount_excluding_tax) / 100);
            }
            $amount = ceil($amount_excluding_tax + $amount_tax);

            $workforces[] = [
                'workforce_type_id' => $item['workforce_type_id'],
                'nb_hours' => $item['nb_hours'],
                'work_fee' => ceil(HourlyRate::where(['id' => $request->hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value),
                'with_tax' => $request->with_tax,
                'discount' => $item['discount'],
                'amount_excluding_tax' => $amount_excluding_tax,
                'amount_tax' => $amount_tax,
                'amount' => $amount,
            ];

            $total_workforce_amount_excluding_tax += $amount_excluding_tax;
            $total_workforce_amount_tax += $amount_tax;
            $total_workforce_amount += $amount;
        }

        if($nb_paint == 0){
            $paint_product_price = null;
        } elseif($nb_paint == 1){
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
        } elseif($nb_paint == 2){
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
        } else {
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
        } 
        
        if ($all_paint == true) {
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
        }

        $total_paint_product_amount_excluding_tax = $paint_product_price ? ceil($paint_product_price->value * $nb_hours_paint_product) : 0;
        $total_paint_product_amount_tax = ceil((config('services.settings.tax_rate') * $total_paint_product_amount_excluding_tax) / 100);
        $total_paint_product_amount = ceil($total_paint_product_amount_excluding_tax + $total_paint_product_amount_tax);

        $total_small_supply_amount_excluding_tax = ceil(($total_new_amount_excluding_tax + $total_workforce_amount_excluding_tax + $total_paint_product_amount_excluding_tax + $total_recovery_amount_excluding_tax) * (config('services.settings.small_supply_rate') / 100));
        $total_small_supply_amount_tax = ceil((config('services.settings.tax_rate') * $total_small_supply_amount_excluding_tax) / 100);
        $total_small_supply_amount = ceil($total_small_supply_amount_excluding_tax + $total_small_supply_amount_tax);

        return $this->responseSuccess('ShockWork calculated successfully', [
            'total_obsolescence_amount_excluding_tax' => $total_obsolescence_amount_excluding_tax,
            'total_obsolescence_amount_tax' => $total_obsolescence_amount_tax,
            'total_obsolescence_amount' => $total_obsolescence_amount,
            'total_recovery_amount_excluding_tax' => $total_recovery_amount_excluding_tax,
            'total_recovery_amount_tax' => $total_recovery_amount_tax,
            'total_recovery_amount' => $total_recovery_amount,
            'total_discount_amount_excluding_tax' => $total_discount_amount_excluding_tax,
            'total_discount_amount_tax' => $total_discount_amount_tax,
            'total_discount_amount' => $total_discount_amount,
            'total_new_amount_excluding_tax' => $total_new_amount_excluding_tax,
            'total_new_amount_tax' => $total_new_amount_tax,
            'total_new_amount' => $total_new_amount,
            'shock_works' => $shock_works,  
            'total_workforce_amount_excluding_tax' => $total_workforce_amount_excluding_tax,
            'total_workforce_amount_tax' => $total_workforce_amount_tax,
            'total_workforce_amount' => $total_workforce_amount,
            'total_paint_product_amount_excluding_tax' => $total_paint_product_amount_excluding_tax,
            'total_paint_product_amount_tax' => $total_paint_product_amount_tax,
            'total_paint_product_amount' => $total_paint_product_amount,
            'total_small_supply_amount_excluding_tax' => $total_small_supply_amount_excluding_tax,
            'total_small_supply_amount_tax' => $total_small_supply_amount_tax,
            'total_small_supply_amount' => $total_small_supply_amount,
            'workforces' => $workforces,
            'total_shock_amount_excluding_tax' => ceil($total_new_amount_excluding_tax + $total_workforce_amount_excluding_tax + $total_paint_product_amount_excluding_tax + $total_small_supply_amount_excluding_tax + $total_recovery_amount_excluding_tax),
            'total_shock_amount_tax' => ceil($total_new_amount_tax + $total_workforce_amount_tax + $total_paint_product_amount_tax + $total_small_supply_amount_tax + $total_recovery_amount_tax),
            'total_shock_amount' => ceil($total_new_amount + $total_workforce_amount + $total_paint_product_amount + $total_small_supply_amount + $total_recovery_amount),
        ]);
    }

    /**
     * Créer une main-d'œuvre de choc d'offre
     *
     * @authenticated
     */
    public function store(CreateWorkforceRequest $request): JsonResponse
    {
        $shock = OfferShock::select('offer_shocks.*')
            ->where('offer_shocks.id', $request->shock_id)
            ->firstOrFail();

        $offer = Offer::where('id',$shock->offer_id)->accessibleBy(auth()->user())->firstOrFail();


        if($offer->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $offer->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible d'ajouter une main-d'oeuvre", null);
        }

        $nb_paint = OfferShockWork::where(['offer_shock_id' => $request->shock_id, 'paint' => 1])->sum('paint');

        $workforces = $request->get('workforces');

        if(count($workforces) > 0){
            $workforce_position = OfferWorkforce::where('offer_shock_id', $request->shock_id)->count() + 1;
            foreach ($workforces as $item) {
                if($item['workforce_type_id'] == WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id){
                    if($nb_paint == 1){
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $request->hourly_rate_id)->first()->id, 'paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    } elseif($nb_paint == 2){
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $request->hourly_rate_id)->first()->id, 'paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    } elseif($nb_paint == 3){
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $request->hourly_rate_id)->first()->id, 'paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    } else {
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $request->hourly_rate_id)->first()->id, 'paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    }
                    
                    if ($item['all_paint'] && $item['all_paint'] == true) {
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $request->hourly_rate_id)->first()->id, 'paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    }

                    $total = $painting_price ? $item['nb_hours'] * $painting_price->param_1 + $painting_price->param_2 : 0;
                } else {
                    $total = $item['nb_hours'] * HourlyRate::where(['id' => $request->hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value;
                }

                $amount_excluding_tax = ceil($total - ($total * $item['discount'] / 100));
                if($request->with_tax == false){
                    $amount_tax = 0;
                } else {
                    $amount_tax = ceil((config('services.settings.tax_rate') * $amount_excluding_tax) / 100);
                }
                $amount = ceil($amount_excluding_tax + $amount_tax);
    
                $workforce = OfferWorkforce::create([
                    'offer_shock_id' => $request->shock_id,
                    'workforce_type_id' => WorkforceType::keyFromHashId($item['workforce_type_id']),
                    'old_workforce_type_id' => WorkforceType::keyFromHashId($item['workforce_type_id']),
                    'nb_hours' => $item['nb_hours'],
                    'old_nb_hours' => $item['nb_hours'],
                    'work_fee' => ceil(HourlyRate::where(['id' => $request->hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value),
                    'old_work_fee' => ceil(HourlyRate::where(['id' => $request->hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value),
                    'with_tax' => $request->with_tax,
                    'discount' => $item['discount'],
                    'old_discount' => $item['discount'],
                    'all_paint' => $item['all_paint'] ?? false,
                    'old_all_paint' => $item['all_paint'] ?? false,
                    'amount_excluding_tax' => $amount_excluding_tax,
                    'old_amount_excluding_tax' => $amount_excluding_tax,
                    'amount_tax' => $amount_tax,
                    'old_amount_tax' => $amount_tax,
                    'amount' => $amount,
                    'old_amount' => $amount,
                    'position' => $workforce_position,
                    'is_before_quote' => $quote_validated ? 0 : 1,
                    'quote_validated' => $quote_validated,
                    'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
                $workforce_position++;
            }

            $this->updateWorkforces($shock->id, $request->paint_type_id, $request->hourly_rate_id, $request->with_tax);

        }

        return $this->responseCreated('Workforce created successfully', null);
    }

    /**
     * Afficher une main-d'œuvre de choc d'offre
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $workforce = OfferWorkforce::accessibleBy(auth()->user())
            ->where('offer_workforces.id', OfferWorkforce::keyFromHashId($id))
            ->firstOrFail();

        return $this->responseSuccess(null, new WorkforceResource($workforce->load('workforceType', 'oldWorkforceType', 'status')));
    }

    /**
     * Mettre à jour une main-d'œuvre de choc d'offre
     *
     * @authenticated
     */
    public function update(UpdateWorkforceRequest $request, $id): JsonResponse
    {
        $workforce = OfferWorkforce::select('offer_workforces.*')
            ->with('offerShock:id,offer_id')
            ->where('offer_workforces.id', OfferWorkforce::keyFromHashId($id))
            ->firstOrFail();

        $offer = Offer::where('id',$workforce->offerShock->offer_id)->accessibleBy(auth()->user())->firstOrFail();

        if($offer->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $offer->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de mettre à jour une main-d'oeuvre", null);
        }

        $nb_paint = OfferShockWork::where(['offer_shock_id' => $workforce->offerShock->id, 'paint' => 1])->sum('paint');

        if($workforce->workforce_type_id == WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id){
            if($nb_paint == 1){
                $painting_price = PaintingPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
            } elseif($nb_paint == 2){
                $painting_price = PaintingPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
            } else {
                $painting_price = PaintingPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
            } 
            
            $all_paint_workforce = OfferWorkforce::where(['offer_shock_id' => $workforce->offerShock->id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
        
            if ($all_paint_workforce && $all_paint_workforce->all_paint == true) {
                $painting_price = PaintingPrice::where(['paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
            }
            
            $total = $painting_price ? $request->nb_hours * $painting_price->param_1 + $painting_price->param_2 : 0;
        } else {
            $total = $request->nb_hours * HourlyRate::where(['id' => $request->hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value;
        }

        $amount_excluding_tax = ceil($total - ($total * $workforce->discount / 100));
        if($request->with_tax == false){
            $amount_tax = 0;
        } else {
            $amount_tax = ceil((config('services.settings.tax_rate') * $amount_excluding_tax) / 100);
        }
        $amount = ceil($amount_excluding_tax + $amount_tax);

        if (
            $workforce->isDirty('workforce_type_id') 
            || $workforce->isDirty('nb_hours') 
            || $workforce->work_fee != ceil(HourlyRate::where(['id' => $request->hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value)
            || $workforce->isDirty('with_tax') 
            || $workforce->isDirty('discount') 
            || $workforce->isDirty('all_paint') 
            || $workforce->workforce_type_id != $request->workforce_type_id
            || $workforce->hourly_rate_id != $request->hourly_rate_id
            || $workforce->paint_type_id != $request->paint_type_id
            || $workforce->with_tax != $request->with_tax
            || $workforce->nb_hours != $request->nb_hours
            || $workforce->discount != $request->discount
            || $workforce->all_paint != $request->all_paint
            || $workforce->amount_excluding_tax != $amount_excluding_tax
            || $workforce->amount_tax != $amount_tax
            || $workforce->amount != $amount) { 

            $workforce->update([
                'offer_shock_id' => $workforce->offerShock->id,
                'workforce_type_id' => $request->workforce_type_id,
                'old_workforce_type_id' => $workforce->getOriginal('workforce_type_id'),
                'nb_hours' => $request->nb_hours,
                'old_nb_hours' => $workforce->getOriginal('nb_hours'),
                'work_fee' => ceil(HourlyRate::where(['id' => $request->hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value),
                'old_work_fee' => $workforce->getOriginal('work_fee'),
                'with_tax' => $request->with_tax,
                'old_with_tax' => $workforce->getOriginal('with_tax'),
                'discount' => $request->discount,
                'old_discount' => $workforce->getOriginal('discount'),
                'all_paint' => $request->all_paint ?? false,
                'old_all_paint' => $workforce->getOriginal('all_paint'),
                'is_before_quote' => $quote_validated ? 0 : 1,
                'quote_validated' => $quote_validated,
                'amount_excluding_tax' => $amount_excluding_tax,
                'amount_tax' => $amount_tax,
                'amount' => $amount,
                'updated_by' => auth()->user()->id,
            ]);
    
            $shock = OfferShock::find($workforce->offerShock->id);
    
            if($shock){
                $shock->update([
                    'paint_type_id' => $request->paint_type_id,
                    'hourly_rate_id' => $request->hourly_rate_id,
                ]);
            }

            $this->updateWorkforces($workforce->offerShock->id, $request->paint_type_id, $request->hourly_rate_id, $request->with_tax);
         }

        return $this->responseSuccess('Workforce updated Successfully', new WorkforceResource($workforce));
    }

    public function updateWorkforces($shock_id, $paint_type_id, $hourly_rate_id, $with_tax): JsonResponse
    {
        $workforces = OfferWorkforce::where(['offer_shock_id' => $shock_id])->get();

        $nb_paint = OfferShockWork::where(['offer_shock_id' => $shock_id, 'paint' => 1])->sum('paint');

        if($workforces){
            foreach($workforces as $item){
                if($item['workforce_type_id'] == WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id){
                    if($nb_paint == 1){
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $hourly_rate_id)->first()->id, 'paint_type_id' => $paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    } elseif($nb_paint == 2){
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $hourly_rate_id)->first()->id, 'paint_type_id' => $paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    } else {
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $hourly_rate_id)->first()->id, 'paint_type_id' => $paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    } 
                    
                    $all_paint_workforce = OfferWorkforce::where(['offer_shock_id' => $shock_id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
        
                    if ($all_paint_workforce && $all_paint_workforce->all_paint == true) {
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $hourly_rate_id)->first()->id, 'paint_type_id' => $paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                    }

                    $total = $painting_price ? $item['nb_hours'] * $painting_price->param_1 + $painting_price->param_2 : 0;
                } else {
                    $total = $item['nb_hours'] * HourlyRate::where(['id' => $hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value;
                }

                $amount_excluding_tax = ceil($total - ($total * $item['discount'] / 100));
                if($with_tax == false){
                    $amount_tax = 0;
                } else {
                    $amount_tax = ceil((config('services.settings.tax_rate') * $amount_excluding_tax) / 100);
                }
                $amount = ceil($amount_excluding_tax + $amount_tax);
    
                $item->update([
                    'offer_shock_id' => $shock_id,
                    'workforce_type_id' => $item['workforce_type_id'],
                    'nb_hours' => $item['nb_hours'],
                    'work_fee' => ceil(HourlyRate::where(['id' => $hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value),
                    'with_tax' => $with_tax,
                    'discount' => $item['discount'],
                    'all_paint' => $item['all_paint'],
                    'amount_excluding_tax' => $amount_excluding_tax,
                    'old_amount_excluding_tax' => $item->getOriginal('amount_excluding_tax'),
                    'amount_tax' => $amount_tax,
                    'old_amount_tax' => $item->getOriginal('amount_tax'),
                    'amount' => $amount,
                    'old_amount' => $item->getOriginal('amount'),
                    'updated_by' => auth()->user()->id,
                ]);
            }

            $this->recalculate($shock_id, $paint_type_id, $hourly_rate_id, $with_tax);

        }

        return $this->responseCreated('Workforce created successfully', null);
    }

    /**
     * Recalculer les données d'une main-d'œuvre de choc d'offre
     *
     * @authenticated
     */
    public function recalculate($id, $paint_type_id, $hourly_rate_id, $with_tax)
    {
        $shock = OfferShock::findOrFail($id);

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

        $nb_paint = OfferShockWork::where(['offer_shock_id' => $shock->id, 'paint' => 1])->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('paint');

        if($nb_paint == 0){
            $paint_product_price = null;
        } elseif($nb_paint == 1){
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;
        } elseif($nb_paint == 2){
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;
        } else {
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;
        } 

        $all_paint_workforce = OfferWorkforce::where(['offer_shock_id' => $shock->id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
        
        if ($all_paint_workforce && $all_paint_workforce->all_paint == true) {
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;;
        }

        $total_paint_product_amount_excluding_tax = $paint_product_price ? ceil($paint_product_price * Workforce::where(['shock_id' => $shock->id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->sum('nb_hours')) : 0;
        $total_paint_product_amount_tax = ceil((config('services.settings.tax_rate') * $total_paint_product_amount_excluding_tax) / 100);
        $total_paint_product_amount = ceil($total_paint_product_amount_excluding_tax + $total_paint_product_amount_tax);

        $total_small_supply_amount_excluding_tax = ceil(($total_new_amount_excluding_tax + $total_workforce_amount_excluding_tax + $total_paint_product_amount_excluding_tax + $total_recovery_amount_excluding_tax) * (config('services.settings.small_supply_rate') / 100));
        $total_small_supply_amount_tax = ceil((config('services.settings.tax_rate') * $total_small_supply_amount_excluding_tax) / 100);
        $total_small_supply_amount = ceil($total_small_supply_amount_excluding_tax + $total_small_supply_amount_tax);

        $shock->update([
            'with_tax' => $with_tax,
            'hourly_rate_id' => $hourly_rate_id,
            'paint_type_id' => $paint_type_id,
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

        $total_shock_amount_excluding_tax = ceil(OfferShock::where('offer_id', $shock->offer_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax'));
        $total_shock_amount_tax = ceil(OfferShock::where('offer_id', $shock->offer_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax'));
        $total_shock_amount = ceil(OfferShock::where('offer_id', $shock->offer_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount'));

        $offer = Offer::findOrFail($shock->offer_id);

        $total_nb_hours = OfferWorkforce::join('offer_shocks', 'offer_workforces.offer_shock_id', '=', 'offer_shocks.id')
                ->join('offers', 'offer_shocks.offer_id', '=', 'offers.id')
                ->select('offer_workforces.nb_hours')
                ->where('offer_shocks.status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                ->where('offer_workforces.status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                ->where('offers.id', $offer->id)
                ->sum('offer_workforces.nb_hours');

        $work_duration = null;
        $work_duration_service = app(WorkDurationService::class);
        $work_duration = $work_duration_service->calculateWorkDuration($total_nb_hours);

        $offer->update([
            'work_duration' => $work_duration,
            'shock_amount_excluding_tax' => $total_shock_amount_excluding_tax,
            'shock_amount_tax' => $total_shock_amount_tax,
            'shock_amount' => $total_shock_amount,
        ]);

        // dispatch(new GenerateExpertiseReportPdfJob($assignment));

    }

    /**
     * Supprimer une main-d'œuvre de choc d'offre
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $workforce = OfferWorkforce::select('offer_workforces.*')
            ->with('offerShock:id,offer_id')
            ->where('offer_workforces.id', OfferWorkforce::keyFromHashId($id))
            ->firstOrFail();

        $offer = Offer::where('id',$workforce->offerShock->offer_id)->accessibleBy(auth()->user())->firstOrFail();

        if($offer->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $offer->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de supprimer une main-d'oeuvre", null);
        }

        $workforce->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_at' => now(),
            'deleted_by' => auth()->user()->id,
        ]);

        $workforce->delete();

        $this->recalculate($workforce->shock_id, $workforce->paint_type_id, $workforce->hourly_rate_id, $workforce->with_tax);

        return $this->responseDeleted();
    }

   
}
