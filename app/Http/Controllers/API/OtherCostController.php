<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\OtherCost;
use App\Models\Assignment;
use App\Models\HourlyRate;
use App\Models\ExpertiseType;
use App\Models\OtherCostType;
use App\Models\PaintingPrice;
use App\Models\WorkforceType;
use App\Models\AssignmentType;
use App\Enums\ExpertiseTypeEnum;
use App\Enums\WorkforceTypeEnum;
use App\Enums\AssignmentTypeEnum;
use App\Models\PaintProductPrice;
use Illuminate\Http\JsonResponse;
use App\Models\NumberPaintElement;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Enums\NumberPaintElementEnum;
use App\Jobs\GenerateExpertiseReportPdfJob;
use App\Services\Receipt\UpdateReceiptService;
use App\Http\Resources\OtherCost\OtherCostResource;
use App\Http\Requests\OtherCost\CreateOtherCostRequest;
use App\Http\Requests\OtherCost\UpdateOtherCostRequest;
use App\Http\Requests\OtherCost\CalculateOtherCostRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des autres charges
 *
 * APIs pour la gestion des autres charges
 */
class OtherCostController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les autres charges
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $otherCosts = OtherCost::with('otherCostType')
                        ->join('assignments', 'other_costs.assignment_id', '=', 'assignments.id')
                        ->accessibleBy(auth()->user())
                        ->latest('created_at')
                        ->useFilters()
                        ->dynamicPaginate();

        return OtherCostResource::collection($otherCosts);
    }

    /**
     * Calculer les autres charges
     *
     * @authenticated
     */
    public function calculate(CalculateOtherCostRequest $request): JsonResponse
    {
        $assignment = Assignment::accessibleBy(auth()->user())
            ->where('assignments.id', $request->assignment_id)
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
            $discount = $shockWork['discount'];
            $discount_amount_excluding_tax = ceil(($shockWork['discount'] * $shockWork['amount']) / 100);
            $discount_amount_tax = ceil((config('services.settings.tax_rate') * $discount_amount_excluding_tax) / 100);
            $discount_amount = ceil($discount_amount_excluding_tax + $discount_amount_tax);

            $obsolescence_rate = $shockWork['obsolescence_rate'];
            $obsolescence_amount_excluding_tax = ceil(($shockWork['obsolescence_rate'] * ($shockWork['amount'] - $discount_amount_excluding_tax)) / 100);
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
                } else {
                    if($nb_paint == 1){
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $request->hourly_rate_id)->first()->id, 'paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                        $nb_hours_paint_product += $item['nb_hours'];
                    } elseif($nb_paint == 2){
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $request->hourly_rate_id)->first()->id, 'paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                        $nb_hours_paint_product += $item['nb_hours'];
                    } else {
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $request->hourly_rate_id)->first()->id, 'paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                        $nb_hours_paint_product += $item['nb_hours'];
                    } 

                    if ($item['all_paint'] == true) {
                        $all_paint = true;
                        $painting_price = PaintingPrice::where(['hourly_rate_id' => HourlyRate::where('id', $request->hourly_rate_id)->first()->id, 'paint_type_id' => $request->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                        $nb_hours_paint_product += $item['nb_hours'];
                    }
                    $total = $painting_price ? $item['nb_hours'] * $painting_price->param_1 + $painting_price->param_2 : 0;
                }
            } else {
                $total = $item['nb_hours'] * HourlyRate::where(['id' => $request->hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value;
            }

            $amount_excluding_tax = ceil($total - ($total * $item['discount'] / 100));
            if($item['with_tax'] == false){
                $amount_tax = 0;
            } else {
                $amount_tax = ceil((config('services.settings.tax_rate') * $amount_excluding_tax) / 100);
            }
            $amount = ceil($amount_excluding_tax + $amount_tax);

            $workforces[] = [
                'workforce_type_id' => $item['workforce_type_id'],
                'nb_hours' => $item['nb_hours'],
                'work_fee' => ceil(HourlyRate::where(['id' => $request->hourly_rate_id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value),
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

        $other_costs = [];
        $total_other_costs_amount_excluding_tax = 0;
        $total_other_costs_amount_tax = 0;
        $total_other_costs_amount = 0;
        $other_costs_amount_excluding_tax = 0;
        $other_costs_amount_tax = 0;
        $other_costs_amount = 0;

        $other_costs = $request->get('other_costs');

        foreach ($other_costs as $item) {
            $other_costs_amount_excluding_tax = $item['amount'];
            $other_costs_amount_tax = ceil((config('services.settings.tax_rate') * $other_costs_amount_excluding_tax) / 100);
            $other_costs_amount = ceil($other_costs_amount_excluding_tax + $other_costs_amount_tax);

            $other_costs[] = [
                'other_cost_type_id' => $item['other_cost_type_id'],
                'amount_excluding_tax' => $other_costs_amount_excluding_tax,
                'amount_tax' => $other_costs_amount_tax,
                'amount' => $other_costs_amount,
            ];

            $total_other_costs_amount_excluding_tax += $other_costs_amount_excluding_tax;
            $total_other_costs_amount_tax += $other_costs_amount_tax;
            $total_other_costs_amount += $other_costs_amount;
        }

        $total_amount_excluding_tax = $total_new_amount_excluding_tax + $total_workforce_amount_excluding_tax + $total_paint_product_amount_excluding_tax + $total_small_supply_amount_excluding_tax + $total_recovery_amount_excluding_tax + $total_other_costs_amount_excluding_tax;
        $total_amount_tax = $total_new_amount_tax + $total_workforce_amount_tax + $total_paint_product_amount_tax + $total_small_supply_amount_tax + $total_recovery_amount_tax + $total_other_costs_amount_tax;
        $total_amount = $total_new_amount + $total_workforce_amount + $total_paint_product_amount + $total_small_supply_amount + $total_recovery_amount + $total_other_costs_amount;

        return $this->responseSuccess('OtherCost calculated successfully', [
            'total_obsolescence_amount_excluding_tax' => $total_obsolescence_amount_excluding_tax,
            'total_obsolescence_amount_tax' => $total_obsolescence_amount_tax,
            'total_obsolescence_amount' => $total_obsolescence_amount,
            'total_recovery_amount_excluding_tax' => $total_recovery_amount_excluding_tax,
            'total_recovery_amount_tax' => $total_recovery_amount_tax,
            'total_recovery_amount' => $total_recovery_amount,
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
            'total_other_costs_amount_excluding_tax' => ceil($total_other_costs_amount_excluding_tax),
            'total_other_costs_amount_tax' => ceil($total_other_costs_amount_tax),
            'total_other_costs_amount' => ceil($total_other_costs_amount),
            'other_costs' => $other_costs,
            'total_amount_excluding_tax' => ceil($total_amount_excluding_tax),
            'total_amount_tax' => ceil($total_amount_tax),
            'total_amount' => ceil($total_amount),
        ]);
    }

    /**
     * Ajouter une autre charge
     *
     * @authenticated
     */
    public function store(CreateOtherCostRequest $request): JsonResponse
    {
        $assignment = Assignment::accessibleBy(auth()->user())
            ->where('assignments.id', $request->assignment_id)
            ->firstOrFail();

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible d'ajouter une autre charge", null);
        }

        $other_costs = $request->get('other_costs');

        if(count($other_costs) > 0){
            foreach ($other_costs as $data) {
                $other_cost = OtherCost::create([
                    'assignment_id' => $assignment->id,
                    'other_cost_type_id' => OtherCostType::keyFromHashId($data['other_cost_type_id']),
                    'amount_excluding_tax' => $data['amount'],
                    'amount_tax' => 0,
                    'amount' => $data['amount'],
                    'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
            }
        }

        $this->recalculate($request->assignment_id);

        return $this->responseCreated('OtherCost created successfully', new OtherCostResource($other_cost));
    }

    /**
     * Afficher une autre charge
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $otherCost = OtherCost::join('assignments', 'other_costs.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('other_costs.id', OtherCost::keyFromHashId($id))
            ->firstOrFail();

        return $this->responseSuccess(null, new OtherCostResource($otherCost));
    }

    /**
     * Mettre à jour une autre charge
     *
     * @authenticated
     */
    public function update(UpdateOtherCostRequest $request, $id): JsonResponse
    {
        $otherCost = OtherCost::join('assignments', 'other_costs.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('other_costs.id', OtherCost::keyFromHashId($id))
            ->firstOrFail();

        $assignment = Assignment::accessibleBy(auth()->user())
            ->where('assignments.id', $otherCost->assignment_id)
            ->firstOrFail();

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de mettre à jour l'autre charge", null);
        }

        $otherCost->update([
            'amount' => $request->amount,
            'assignment_id' => $assignment->id,
            'other_cost_type_id' => $request->other_cost_type_id,
            'updated_by' => auth()->user()->id,
        ]);

        $this->recalculate($otherCost->assignment_id);

        return $this->responseSuccess('OtherCost updated Successfully', new OtherCostResource($otherCost));
    }

    public function recalculate($id)
    {
        $assignment = Assignment::accessibleBy(auth()->user())
            ->where('assignments.id', $id)
            ->firstOrFail();

        $total_other_cost_amount_excluding_tax = OtherCost::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax');
        $total_other_cost_amount_tax = OtherCost::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax');
        $total_other_cost_amount = OtherCost::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount');

        $total_amount_excluding_tax = $assignment->total_amount_excluding_tax + $total_other_cost_amount_excluding_tax;
        $total_amount_tax = $assignment->total_amount_tax + $total_other_cost_amount_tax;
        $total_amount = $assignment->total_amount + $total_other_cost_amount;

        $assignment->update([
            'other_cost_amount_excluding_tax' => $total_other_cost_amount_excluding_tax,
            'other_cost_amount_tax' => $total_other_cost_amount_tax,
            'other_cost_amount' => $total_other_cost_amount,
            'total_amount_excluding_tax' => $total_amount_excluding_tax,
            'total_amount_tax' => $total_amount_tax,
            'total_amount' => $total_amount,
        ]);

        $updateReceiptService = app(UpdateReceiptService::class);
        $updateReceiptService->updateReceipt($assignment->id);

        // dispatch(new GenerateExpertiseReportPdfJob($assignment));
    }
    /**
     * Supprimer une autre charge
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $otherCost = OtherCost::join('assignments', 'other_costs.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('other_costs.id', OtherCost::keyFromHashId($id))
            ->firstOrFail();

        $assignment = Assignment::accessibleBy(auth()->user())
            ->where('assignments.id', $otherCost->assignment_id)
            ->firstOrFail();

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de supprimer l'autre charge", null);
        }

        $otherCost->delete();

        $this->recalculate($otherCost->assignment_id);

        return $this->responseDeleted();
    }

   
}
