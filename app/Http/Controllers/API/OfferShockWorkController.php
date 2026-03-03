<?php

namespace App\Http\Controllers\API;

use App\Enums\AssignmentTypeEnum;
use App\Enums\EntityTypeEnum;
use App\Enums\ExpertiseTypeEnum;
use App\Enums\NumberPaintElementEnum;
use App\Enums\StatusEnum;
use App\Enums\WorkforceTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShockWork\CalculateShockWorkRequest;
use App\Http\Requests\ShockWork\CreateShockWorkRequest;
use App\Http\Requests\ShockWork\GetSupplyPriceRequest;
use App\Http\Requests\ShockWork\UpdateShockWorkRequest;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Resources\OfferShockWork\OfferShockWorkResource;
use App\Http\Resources\Shock\ShockResource;
use App\Http\Resources\ShockWork\ShockWorkResource;
use App\Jobs\GenerateExpertiseReportPdfJob;
use App\Models\Assignment;
use App\Models\AssignmentType;
use App\Models\Entity;
use App\Models\ExpertiseType;
use App\Models\NumberPaintElement;
use App\Models\Offer;
use App\Models\OfferShock;
use App\Models\OfferShockWork;
use App\Models\OtherCost;
use App\Models\PaintProductPrice;
use App\Models\Shock;
use App\Models\ShockWork;
use App\Models\Status;
use App\Models\Supply;
use App\Models\Vehicle;
use App\Models\Workforce;
use App\Models\WorkforceType;
use App\Services\Receipt\UpdateReceiptService;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des travaux de choc d'offre
 *
 * APIs pour la gestion des travaux de choc d'offre
 */
class OfferShockWorkController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les travaux de choc d'offre
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $offerShockWorks = OfferShockWork::select('offer_shock_works.*')
                    ->with('supply', 'status', 'oldSupply')
                    ->join('offer_shocks', 'offer_shock_works.offer_shock_id', '=', 'offer_shocks.id')
                    ->join('offers', 'offer_shocks.offer_id', '=', 'offers.id')
                    ->accessibleBy(auth()->user())
                    ->useFilters()
                    ->orderBy('position', 'asc')
                    ->dynamicPaginate();

        return OfferShockWorkResource::collection($offerShockWorks);
    }

    /**
     * Calculer les points de shocs d'offre
     *
     * @authenticated
     */
    public function calculate(CalculateShockWorkRequest $request): JsonResponse
    {
        $offerShock = OfferShock::select('offer_shocks.*')
            ->join('offers', 'offer_shocks.offer_id', '=', 'offers.id')
            ->accessibleBy(auth()->user())
            ->where('offer_shocks.id', $request->offer_shock_id)
            ->firstOrFail();
        $offer = Offer::accessibleBy(auth()->user())
            ->where('offers.id', $offerShock->offer_id)
            ->firstOrFail();

        $offerShockWorks = [];
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
        $total_discount_amount_excluding_tax = 0;
        $total_discount_amount_tax = 0;
        $total_discount_amount = 0;
        $total_new_amount_excluding_tax = 0;
        $total_new_amount_tax = 0;
        $total_new_amount = 0;
        $total_in_order_amount_excluding_tax = 0;
        $total_in_order_amount_tax = 0;
        $total_in_order_amount = 0;

        $offerShockWorks = $request->get('offer_shock_works');

        foreach ($offerShockWorks as $item) {
            $discount = $item['discount'];
            $discount_amount_excluding_tax = ceil(($item['discount'] * $item['amount']) / 100);
            $discount_amount_tax = ceil((config('services.settings.tax_rate') * $discount_amount_excluding_tax) / 100);
            $discount_amount = ceil($discount_amount_excluding_tax + $discount_amount_tax);

            $obsolescence_rate = $item['obsolescence_rate'];
            $obsolescence_amount_excluding_tax = ceil(($item['obsolescence_rate'] * ($item['amount'] - $discount_amount_excluding_tax)) / 100);
            $obsolescence_amount_tax = ceil((config('services.settings.tax_rate') * $obsolescence_amount_excluding_tax) / 100);
            $obsolescence_amount = ceil($obsolescence_amount_excluding_tax + $obsolescence_amount_tax);

            $recovery_amount = $item['recovery_amount'];
            $recovery_amount_excluding_tax = ($item['recovery_amount'] * $item['amount']) / 100;
            $recovery_amount_tax = (config('services.settings.tax_rate') * $recovery_amount_excluding_tax) / 100;
            $recovery_amount = $recovery_amount_excluding_tax + $recovery_amount_tax;

            $new_amount_excluding_tax = ceil($item['amount'] - ($obsolescence_amount_excluding_tax + $discount_amount_excluding_tax));
            if($assignment->expertise_type_id == ExpertiseType::where('code', ExpertiseTypeEnum::EVALUATION)->first()->id || $assignment->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::EVALUATION)->first()->id){
                $new_amount_tax = 0;
            } else {
                $new_amount_tax = ceil((config('services.settings.tax_rate') * $new_amount_excluding_tax) / 100);
            }
            $new_amount = ceil($new_amount_excluding_tax + $new_amount_tax);

            $offerShockWorks[] = [
                'obsolescence_rate' => $obsolescence_rate,
                'obsolescence_amount_excluding_tax' => $obsolescence_amount_excluding_tax,
                'obsolescence_amount_tax' => $obsolescence_amount_tax,
                'obsolescence_amount' => $obsolescence_amount,
                'recovery_amount_excluding_tax' => $recovery_amount_excluding_tax,
                'recovery_amount_tax' => $recovery_amount_tax,
                'recovery_amount' => $recovery_amount,
                'discount' => $item['discount'],
                'discount_amount_excluding_tax' => $discount_amount_excluding_tax,
                'discount_amount_tax' => $discount_amount_tax,
                'discount_amount' => $discount_amount,
                'new_amount_excluding_tax' => $new_amount_excluding_tax,
                'new_amount_tax' => $new_amount_tax,
                'new_amount' => $new_amount,
            ];
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
            if($item['in_order'] == true){
                $total_in_order_amount_excluding_tax += $new_amount_excluding_tax;
                $total_in_order_amount_tax += $new_amount_tax;
                $total_in_order_amount += $new_amount;
            }
        }

        return $this->responseSuccess('OfferShockWork calculated successfully', [
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
            'total_in_order_amount_excluding_tax' => $total_in_order_amount_excluding_tax,
            'total_in_order_amount_tax' => $total_in_order_amount_tax,
            'total_in_order_amount' => $total_in_order_amount,
            'offer_shock_works' => $offerShockWorks,
        ]);
    }

    /**
     * Ajouter un travail de choc d'offre
     *
     * @authenticated
     */
    public function store(CreateShockWorkRequest $request): JsonResponse
    {
        $offerShock = OfferShock::select('offer_shocks.*')
            ->where('offer_shocks.id', $request->offer_shock_id)
            ->firstOrFail();

        $offer = Offer::accessibleBy(auth()->user())
            ->where('offers.id', $offerShock->offer_id)
            ->firstOrFail();

        if($offer->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $offer->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible d'ajouter un travail de choc d'offre", null);
        }

        $offerShockWorks = $request->get('offer_shock_works');

        if(count($offerShockWorks) > 0){
            $offer_shock_work_position = OfferShockWork::where('offer_shock_id', $offerShock->id)->count() + 1;
            foreach ($offerShockWorks as $item) {
                $discount = $item['discount'];
                $discount_amount_excluding_tax = ceil(($item['discount'] * $item['amount']) / 100);
                $discount_amount_tax = ceil((config('services.settings.tax_rate') * $discount_amount_excluding_tax) / 100);
                $discount_amount = ceil($discount_amount_excluding_tax + $discount_amount_tax);

                $obsolescence_rate = $item['obsolescence_rate'];
                $obsolescence_amount_excluding_tax = ceil(($item['obsolescence_rate'] * ($item['amount'] - $discount_amount_excluding_tax)) / 100);
                $obsolescence_amount_tax = ceil((config('services.settings.tax_rate') * $obsolescence_amount_excluding_tax) / 100);
                $obsolescence_amount = ceil($obsolescence_amount_excluding_tax + $obsolescence_amount_tax);

                $recovery_amount = $item['recovery_amount'];
                $recovery_amount_excluding_tax = ceil(($item['recovery_amount'] * $item['amount']) / 100);
                $recovery_amount_tax = 0;
                $recovery_amount = ceil($recovery_amount_excluding_tax + $recovery_amount_tax);

                $new_amount_excluding_tax = ceil($item['amount'] - ($obsolescence_amount_excluding_tax + $discount_amount_excluding_tax));
                if($assignment->expertise_type_id == ExpertiseType::where('code', ExpertiseTypeEnum::EVALUATION)->first()->id || $assignment->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::EVALUATION)->first()->id){
                    $new_amount_tax = 0;
                } else {
                    $new_amount_tax = ceil((config('services.settings.tax_rate') * $new_amount_excluding_tax) / 100);
                }
                $new_amount = ceil($new_amount_excluding_tax + $new_amount_tax);
                
                $offerShockWork = OfferShockWork::create([
                    'offer_shock_id' => $offerShock->id,
                    'supply_id' => Supply::keyFromHashId($item['supply_id']),
                    'old_supply_id' => null,
                    'disassembly' => $item['disassembly'],
                    'old_disassembly' => $item['disassembly'],
                    'replacement' => $item['replacement'],
                    'old_replacement' => $item['replacement'],
                    'repair' => $item['repair'],
                    'old_repair' => $item['repair'],
                    'paint' => $item['paint'],
                    'old_paint' => $item['paint'],
                    'control' => $item['control'],
                    'old_control' => $item['control'],
                    'in_order' => $item['in_order'],
                    'old_in_order' => $item['in_order'],
                    'comment' => $item['comment'],
                    'old_comment' => $item['comment'],
                    'position' => $offer_shock_work_position,
                    'obsolescence' => $item['obsolescence'],
                    'old_obsolescence' => $item['obsolescence'],
                    'amount' => $item['amount'],
                    'old_amount' => $item['amount'],
                    'obsolescence_rate' => $obsolescence_rate,
                    'old_obsolescence_rate' => $obsolescence_rate,
                    'obsolescence_amount_excluding_tax' => $obsolescence_amount_excluding_tax,
                    'old_obsolescence_amount_excluding_tax' => $obsolescence_amount_excluding_tax,
                    'obsolescence_amount_tax' => $obsolescence_amount_tax,
                    'old_obsolescence_amount_tax' => $obsolescence_amount_tax,
                    'obsolescence_amount' => $obsolescence_amount,
                    'old_obsolescence_amount' => $obsolescence_amount,
                    'recovery_amount_excluding_tax' => $recovery_amount_excluding_tax,
                    'old_recovery_amount_excluding_tax' => $recovery_amount_excluding_tax,
                    'recovery_amount_tax' => $recovery_amount_tax,
                    'old_recovery_amount_tax' => $recovery_amount_tax,
                    'recovery_amount' => $recovery_amount,
                    'old_recovery_amount' => $recovery_amount,
                    'discount' => $item['discount'],
                    'old_discount' => $item['discount'],
                    'discount_amount_excluding_tax' => $discount_amount_excluding_tax,
                    'old_discount_amount_excluding_tax' => $discount_amount_excluding_tax,
                    'discount_amount_tax' => $discount_amount_tax,
                    'old_discount_amount_tax' => $discount_amount_tax,
                    'discount_amount' => $discount_amount,
                    'old_discount_amount' => $discount_amount,
                    'new_amount_excluding_tax' => $new_amount_excluding_tax,
                    'old_new_amount_excluding_tax' => $new_amount_excluding_tax,
                    'new_amount_tax' => $new_amount_tax,
                    'old_new_amount_tax' => $new_amount_tax,
                    'new_amount' => $new_amount,
                    'old_new_amount' => $new_amount,
                    'is_before_quote' => $quote_validated ? 0 : 1,
                    'quote_validated' => $quote_validated,
                    'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
                $offer_shock_work_position++;
            }

            $this->recalculate($offerShockWork->id);
        }
        
        return $this->responseCreated('OfferShockWork created successfully', null);
    }

    /**
     * Afficher un travail de choc d'offre
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $offerShockWork = OfferShockWork::select('offer_shock_works.*')
            ->join('offer_shocks', 'offer_shock_works.offer_shock_id', '=', 'offer_shocks.id')
            ->join('offers', 'offer_shocks.offer_id', '=', 'offers.id')
            ->accessibleBy(auth()->user())
            ->where('offer_shock_works.id', OfferShockWork::keyFromHashId($id))
            ->firstOrFail();

        return $this->responseSuccess(null, new ShockWorkResource($shockWork->load('supply', 'oldSupply', 'status')));
    }

    /**
     * Mettre à jour un travail de choc d'offre
     *
     * @authenticated
     */
    public function update(UpdateShockWorkRequest $request, $id): JsonResponse
    {
        $offerShockWork = OfferShockWork::select('offer_shock_works.*')
            ->with('offerShock:id,offer_id')
            ->where('offer_shock_works.id', OfferShockWork::keyFromHashId($id))
            ->firstOrFail();

        $offer = Offer::accessibleBy(auth()->user())
            ->where('offers.id', $offerShockWork->offer_shock->offer_id)
            ->firstOrFail();

        if($offer->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $offer->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de mettre à jour un travail de choc d'offre", null);
        }

        $discount = $request->discount;
        $discount_amount_excluding_tax = ceil(($request->discount * $request->amount) / 100);
        $discount_amount_tax = ceil((config('services.settings.tax_rate') * $discount_amount_excluding_tax) / 100);
        $discount_amount = ceil($discount_amount_excluding_tax + $discount_amount_tax);

        $obsolescence_rate = $request->obsolescence_rate;
        $obsolescence_amount_excluding_tax = ceil(($request->obsolescence_rate * ($request->amount - $discount_amount_excluding_tax)) / 100);
        $obsolescence_amount_tax = ceil((config('services.settings.tax_rate') * $obsolescence_amount_excluding_tax) / 100);
        $obsolescence_amount = ceil($obsolescence_amount_excluding_tax + $obsolescence_amount_tax);

        $recovery_amount = $request->recovery_amount;
        $recovery_amount_excluding_tax = ceil($request->recovery_amount);
        $recovery_amount_tax = 0;
        $recovery_amount = ceil($recovery_amount_excluding_tax + $recovery_amount_tax);

        $new_amount_excluding_tax = ceil($request->amount - ($obsolescence_amount_excluding_tax + $discount_amount_excluding_tax));
        if($assignment->expertise_type_id == ExpertiseType::where('code', ExpertiseTypeEnum::EVALUATION)->first()->id || $assignment->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::EVALUATION)->first()->id){
            $new_amount_tax = 0;
        } else {
            $new_amount_tax = ceil((config('services.settings.tax_rate') * $new_amount_excluding_tax) / 100);
        }
        $new_amount = ceil($new_amount_excluding_tax + $new_amount_tax);

        if (
            $offerShockWork->isDirty('supply_id') 
            || $offerShockWork->isDirty('disassembly') 
            || $offerShockWork->isDirty('replacement') 
            || $offerShockWork->isDirty('repair') 
            || $offerShockWork->isDirty('paint') 
            || $offerShockWork->isDirty('obsolescence') 
            || $offerShockWork->isDirty('control') 
            || $offerShockWork->isDirty('in_order')
            || $offerShockWork->isDirty('comment') 
            || $offerShockWork->isDirty('amount') 
            || $offerShockWork->isDirty('obsolescence_rate') 
            || $offerShockWork->isDirty('discount') 
            || $offerShockWork->supply_id != $request->supply_id
            || $offerShockWork->disassembly != $request->disassembly
            || $offerShockWork->replacement != $request->replacement
            || $offerShockWork->repair != $request->repair
            || $offerShockWork->paint != $request->paint
            || $offerShockWork->obsolescence != $request->obsolescence
            || $offerShockWork->control != $request->control
            || $offerShockWork->in_order != $request->in_order
            || $offerShockWork->comment != $request->comment
            || $offerShockWork->amount != $request->amount
            || $offerShockWork->obsolescence_rate != $obsolescence_rate
            || $offerShockWork->discount != $discount
            || $offerShockWork->obsolescence_amount != $obsolescence_amount
            || $offerShockWork->discount_amount != $discount_amount
            || $offerShockWork->recovery_amount != $recovery_amount
            || $offerShockWork->new_amount != $new_amount) {
            $offerShockWork->update([
                'supply_id' => $request->supply_id,
                'old_supply_id' => $offerShockWork->getOriginal('supply_id'),
                'disassembly' => $request->disassembly,
                'old_disassembly' => $offerShockWork->getOriginal('disassembly'),
                'replacement' => $request->replacement,
                'old_replacement' => $offerShockWork->getOriginal('replacement'),
                'repair' => $request->repair,
                'old_repair' => $offerShockWork->getOriginal('repair'),
                'paint' => $request->paint,
                'old_paint' => $offerShockWork->getOriginal('paint'),
                'control' => $request->control,
                'old_control' => $offerShockWork->getOriginal('control'),
                'in_order' => $request->in_order,
                'old_in_order' => $offerShockWork->getOriginal('in_order'),
                'comment' => $request->comment,
                'old_comment' => $offerShockWork->getOriginal('comment'),
                'obsolescence' => $request->obsolescence,
                'old_obsolescence' => $offerShockWork->getOriginal('obsolescence'),
                'amount' => $request->amount,
                'old_amount' => $offerShockWork->getOriginal('amount'),
                'obsolescence_rate' => $obsolescence_rate,
                'old_obsolescence_rate' => $offerShockWork->getOriginal('obsolescence_rate'),
                'obsolescence_amount_excluding_tax' => $obsolescence_amount_excluding_tax,
                'old_obsolescence_amount_excluding_tax' => $offerShockWork->getOriginal('obsolescence_amount_excluding_tax'),
                'obsolescence_amount_tax' => $obsolescence_amount_tax,
                'old_obsolescence_amount_tax' => $offerShockWork->getOriginal('obsolescence_amount_tax'),
                'obsolescence_amount' => $obsolescence_amount,
                'old_obsolescence_amount' => $offerShockWork->getOriginal('obsolescence_amount'),
                'recovery_amount_excluding_tax' => $recovery_amount_excluding_tax,
                'old_recovery_amount_excluding_tax' => $offerShockWork->getOriginal('recovery_amount_excluding_tax'),
                'recovery_amount_tax' => $recovery_amount_tax,
                'old_recovery_amount_tax' => $offerShockWork->getOriginal('recovery_amount_tax'),
                'recovery_amount' => $recovery_amount,
                'old_recovery_amount' => $offerShockWork->getOriginal('recovery_amount'),
                'discount' => $discount,
                'old_discount' => $offerShockWork->getOriginal('discount'),
                'discount_amount_excluding_tax' => $discount_amount_excluding_tax,
                'old_discount_amount_excluding_tax' => $offerShockWork->getOriginal('discount_amount_excluding_tax'),
                'discount_amount_tax' => $discount_amount_tax,
                'old_discount_amount_tax' => $offerShockWork->getOriginal('discount_amount_tax'),
                'discount_amount' => $discount_amount,
                'old_discount_amount' => $offerShockWork->getOriginal('discount_amount'),
                'new_amount_excluding_tax' => $new_amount_excluding_tax,
                'old_new_amount_excluding_tax' => $offerShockWork->getOriginal('new_amount_excluding_tax'),
                'new_amount_tax' => $new_amount_tax,
                'old_new_amount_tax' => $offerShockWork->getOriginal('new_amount_tax'),
                'new_amount' => $new_amount,
                'old_new_amount' => $offerShockWork->getOriginal('new_amount'),
                'is_before_quote' => $quote_validated ? 0 : 1,
                'quote_validated' => $quote_validated,
                'updated_by' => auth()->user()->id,
            ]);

            $this->recalculate($offerShockWork->offer_shock_id);
        }

        return $this->responseSuccess('ShockWork updated Successfully', new ShockWorkResource($shockWork->load('supply', 'status')));
    }

    public function recalculate($id)
    {
        $offerShock = OfferShock::findOrFail($id);

        $total_in_order_amount_excluding_tax = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('in_order', true)->sum('new_amount_excluding_tax');
        $total_in_order_amount_tax = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('in_order', true)->sum('new_amount_tax');
        $total_in_order_amount = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('in_order', true)->sum('new_amount');

        $total_obsolescence_amount_excluding_tax = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('obsolescence_amount_excluding_tax');
        $total_obsolescence_amount_tax = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('obsolescence_amount_tax');
        $total_obsolescence_amount = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('obsolescence_amount');

        $total_recovery_amount_excluding_tax = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('recovery_amount_excluding_tax');
        $total_recovery_amount_tax = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('recovery_amount_tax');
        $total_recovery_amount = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('recovery_amount');

        $total_discount_amount_excluding_tax = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('discount_amount_excluding_tax');
        $total_discount_amount_tax = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('discount_amount_tax');
        $total_discount_amount = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('discount_amount');

        $total_new_amount_excluding_tax = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount_excluding_tax');
        $total_new_amount_tax = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount_tax');
        $total_new_amount = OfferShockWork::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount');

        $total_workforce_amount_excluding_tax = OfferWorkforce::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax');
        $total_workforce_amount_tax = OfferWorkforce::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax');
        $total_workforce_amount = OfferWorkforce::where('offer_shock_id', $offerShock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount');

        $nb_paint = OfferShockWork::where(['offer_shock_id' => $offerShock->id, 'paint' => 1])->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('paint');

        if($nb_paint == 0){
            $paint_product_price = null;
        } elseif($nb_paint == 1){
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $offerShock->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;
        } elseif($nb_paint == 2){
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $offerShock->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;
        } else {
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $offerShock->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;
        } 
        
        $all_paint_workforce = OfferWorkforce::where(['offer_shock_id' => $offerShock->id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
        
        if ($all_paint_workforce && $all_paint_workforce->all_paint == true) {
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $offerShock->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;
        }

        $total_paint_product_amount_excluding_tax = $paint_product_price ? ceil($paint_product_price * OfferWorkforce::where(['offer_shock_id' => $offerShock->id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->sum('nb_hours')) : 0;
        $total_paint_product_amount_tax = ceil((config('services.settings.tax_rate') * $total_paint_product_amount_excluding_tax) / 100);
        $total_paint_product_amount = ceil($total_paint_product_amount_excluding_tax + $total_paint_product_amount_tax);

        $total_small_supply_amount_excluding_tax = ceil(($total_new_amount_excluding_tax + $total_workforce_amount_excluding_tax + $total_paint_product_amount_excluding_tax + $total_recovery_amount_excluding_tax) * (config('services.settings.small_supply_rate') / 100));
        $total_small_supply_amount_tax = ceil((config('services.settings.tax_rate') * $total_small_supply_amount_excluding_tax) / 100);
        $total_small_supply_amount = ceil($total_small_supply_amount_excluding_tax + $total_small_supply_amount_tax);

        $offerShock->update([
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

        $total_shock_amount_excluding_tax = ceil(OfferShock::where('offer_id', $offerShock->offer_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax'));
        $total_shock_amount_tax = ceil(OfferShock::where('offer_id', $offerShock->offer_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax'));
        $total_shock_amount = ceil(OfferShock::where('offer_id', $offerShock->offer_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount'));

        $offer = Offer::findOrFail($offerShock->offer_id);

        $offer->update([
            'shock_amount_excluding_tax' => $total_shock_amount_excluding_tax,
            'shock_amount_tax' => $total_shock_amount_tax,
            'shock_amount' => $total_shock_amount,
        ]);

        $updateReceiptService = app(UpdateReceiptService::class);
        $updateReceiptService->updateReceipt($offer->id);

        // dispatch(new GenerateExpertiseReportPdfJob($assignment));
    }

    /**
     * Supprimer un travail de choc d'offre
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $offerShockWork = OfferShockWork::select('offer_shock_works.*')
            ->with('offerShock:id,offer_id')
            ->where('offer_shock_works.id', OfferShockWork::keyFromHashId($id))
            ->firstOrFail();

        $offer = Offer::where('id',$offerShockWork->offer_shock->offer_id)->accessibleBy(auth()->user())->firstOrFail();

        if($offer->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $offer->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de supprimer un travail de choc", null);
        }

        $offerShockWork->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_at' => now(),
            'deleted_by' => auth()->user()->id,
        ]);

        $offerShockWork->delete();

        $this->recalculate($offerShockWork->offer_shock_id);

        return $this->responseDeleted();
    }
}
