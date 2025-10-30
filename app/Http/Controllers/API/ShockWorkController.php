<?php

namespace App\Http\Controllers\API;

use App\Models\Shock;
use App\Models\Status;
use App\Models\Supply;
use App\Models\Vehicle;
use App\Enums\StatusEnum;
use App\Models\OtherCost;
use App\Models\ShockWork;
use App\Models\Workforce;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\ExpertiseType;
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
use App\Http\Resources\Shock\ShockResource;
use App\Jobs\GenerateExpertiseReportPdfJob;
use App\Services\Receipt\UpdateReceiptService;
use App\Http\Resources\ShockWork\ShockWorkResource;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Requests\ShockWork\GetSupplyPriceRequest;
use App\Http\Requests\ShockWork\CreateShockWorkRequest;
use App\Http\Requests\ShockWork\UpdateShockWorkRequest;
use App\Http\Requests\ShockWork\CalculateShockWorkRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des travaux de choc
 *
 * APIs pour la gestion des travaux de choc
 */
class ShockWorkController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les travaux de choc
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $shockWorks = ShockWork::with('supply', 'status')
                    ->join('shocks', 'shock_works.shock_id', '=', 'shocks.id')
                    ->join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
                    ->accessibleBy(auth()->user())
                    ->useFilters()
                    ->orderBy('position', 'asc')
                    ->dynamicPaginate();

        return ShockWorkResource::collection($shockWorks);
    }

    /**
     * Calculer les points de shocs
     *
     * @authenticated
     */
    public function calculate(CalculateShockWorkRequest $request): JsonResponse
    {
        $shock = Shock::join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('shocks.id', $request->shock_id)
            ->firstOrFail();
        $assignment = Assignment::findOrFail($shock->assignment_id);

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
        $total_discount_amount_excluding_tax = 0;
        $total_discount_amount_tax = 0;
        $total_discount_amount = 0;
        $total_new_amount_excluding_tax = 0;
        $total_new_amount_tax = 0;
        $total_new_amount = 0;

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

            $shock_works[] = [
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
        }

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
        ]);
    }

    /**
     * Ajouter un travail de choc
     *
     * @authenticated
     */
    public function store(CreateShockWorkRequest $request): JsonResponse
    {
        $shock = Shock::join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('shocks.id', $request->shock_id)
            ->firstOrFail();

        $assignment = Assignment::findOrFail($shock->assignment_id);

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible d'ajouter un travail de choc", null);
        }

        $shockWorks = $request->get('shock_works');

        $is_validated = false;
        if($assignment->is_validated_by_expert == 1 && $assignment->is_validated_by_repairer == 1){
            $is_validated = true;
        }

        if(count($shockWorks) > 0){
            $shock_work_position = ShockWork::where('shock_id', $shock->id)->count() + 1;
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
                
                $shockWork = ShockWork::create([
                    'shock_id' => $shock->id,
                    'supply_id' => Supply::keyFromHashId($item['supply_id']),
                    'disassembly' => $item['disassembly'],
                    'replacement' => $item['replacement'],
                    'repair' => $item['repair'],
                    'paint' => $item['paint'],
                    'control' => $item['control'],
                    'comment' => $item['comment'],
                    'position' => $shock_work_position,
                    'obsolescence' => $item['obsolescence'],
                    'amount' => $item['amount'],
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
                    'is_before_quote' => $is_validated ? 0 : 1,
                    'is_validated' => $is_validated,
                    'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
                $shock_work_position++;
            }

            $user_entity = Entity::with('entityType:id,code')->findOrFail(auth()->user()->entity_id);
            if($is_validated){
                if($user_entity->entityType->code == EntityTypeEnum::ORGANIZATION){
                    $assignment->update([
                        'is_validated_by_expert' => 0,
                    ]);
                }
                if($user_entity->entityType->code == EntityTypeEnum::REPAIRER){
                    $assignment->update([
                        'is_validated_by_repairer' => 0,
                    ]);
                }
            }

            $this->recalculate($shockWork->shock_id);
        }
        
        return $this->responseCreated('ShockWork created successfully', ['shock_work' => new ShockWorkResource($shockWork->load('supply', 'status')), 'assignment' => new AssignmentResource($assignment->load('shocks', 'shocks.shockPoint', 'shocks.shockWorks', 'shocks.workforces', 'shocks.paintType', 'shocks.hourlyRate', 'shocks.status'))]);
    }

    /**
     * Afficher un travail de choc
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $shockWork = ShockWork::join('shocks', 'shock_works.shock_id', '=', 'shocks.id')
            ->join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('shock_works.id', ShockWork::keyFromHashId($id))
            ->firstOrFail();

        return $this->responseSuccess(null, new ShockWorkResource($shockWork->load('supply', 'status')));
    }

    /**
     * Mettre à jour un travail de choc
     *
     * @authenticated
     */
    public function update(UpdateShockWorkRequest $request, $id): JsonResponse
    {
        $shockWork = ShockWork::with('shock')
            ->join('shocks', 'shock_works.shock_id', '=', 'shocks.id')
            ->join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('shock_works.id', ShockWork::keyFromHashId($id))
            ->firstOrFail();

        $assignment = Assignment::findOrFail($shockWork->shock->assignment_id);

        $is_validated = false;
        if($assignment->is_validated_by_expert == 1 && $assignment->is_validated_by_repairer == 1){
            $is_validated = true;
        }

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de mettre à jour un travail de choc", null);
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
            $shockWork->isDirty('supply_id') 
            || $shockWork->isDirty('disassembly') 
            || $shockWork->isDirty('replacement') 
            || $shockWork->isDirty('repair') 
            || $shockWork->isDirty('paint') 
            || $shockWork->isDirty('obsolescence') 
            || $shockWork->isDirty('control') 
            || $shockWork->isDirty('comment') 
            || $shockWork->isDirty('amount') 
            || $shockWork->isDirty('obsolescence_rate') 
            || $shockWork->isDirty('discount') 
            || $shockWork->obsolescence_amount != $obsolescence_amount
            || $shockWork->discount_amount != $discount_amount
            || $shockWork->recovery_amount != $recovery_amount
            || $shockWork->new_amount != $new_amount) {
            $shockWork->update([
                'supply_id' => $request->supply_id,
                'disassembly' => $request->disassembly,
                'replacement' => $request->replacement,
                'repair' => $request->repair,
                'paint' => $request->paint,
                'control' => $request->control,
                'comment' => $request->comment,
                'obsolescence' => $request->obsolescence,
                'amount' => $request->amount,
                'obsolescence_rate' => $obsolescence_rate,
                'obsolescence_amount_excluding_tax' => $obsolescence_amount_excluding_tax,
                'obsolescence_amount_tax' => $obsolescence_amount_tax,
                'obsolescence_amount' => $obsolescence_amount,
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
                'is_before_quote' => $is_validated ? 0 : 1,
                'is_validated' => $is_validated,
                'updated_by' => auth()->user()->id,
            ]);

            $shock = Shock::find($shockWork->shock_id);
    
            if($shock){
                $shock->update([
                    'is_before_quote' => $is_validated ? 0 : 1,
                    'is_validated' => $is_validated
                ]);
            }

            $user_entity = Entity::with('entityType:id,code')->findOrFail(auth()->user()->entity_id);
            if($is_validated){
                if($user_entity->entityType->code == EntityTypeEnum::ORGANIZATION){
                    $assignment->update([
                        'is_validated_by_expert' => 0,
                    ]);
                }
                if($user_entity->entityType->code == EntityTypeEnum::REPAIRER){
                    $assignment->update([
                        'is_validated_by_repairer' => 0,
                    ]);
                }
            }
    
            $this->recalculate($shockWork->shock_id);
        }

        return $this->responseSuccess('ShockWork updated Successfully', new ShockWorkResource($shockWork->load('supply', 'status')));
    }

    public function recalculate($id)
    {
        $shock = Shock::findOrFail($id);

        $total_obsolescence_amount_excluding_tax = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('obsolescence_amount_excluding_tax');
        $total_obsolescence_amount_tax = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('obsolescence_amount_tax');
        $total_obsolescence_amount = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('obsolescence_amount');

        $total_recovery_amount_excluding_tax = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('recovery_amount_excluding_tax');
        $total_recovery_amount_tax = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('recovery_amount_tax');
        $total_recovery_amount = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('recovery_amount');

        $total_discount_amount_excluding_tax = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('discount_amount_excluding_tax');
        $total_discount_amount_tax = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('discount_amount_tax');
        $total_discount_amount = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('discount_amount');

        $total_new_amount_excluding_tax = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount_excluding_tax');
        $total_new_amount_tax = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount_tax');
        $total_new_amount = ShockWork::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('new_amount');

        $total_workforce_amount_excluding_tax = Workforce::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax');
        $total_workforce_amount_tax = Workforce::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax');
        $total_workforce_amount = Workforce::where('shock_id', $shock->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount');

        $nb_paint = ShockWork::where(['shock_id' => $shock->id, 'paint' => 1])->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('paint');

        if($nb_paint == 0){
            $paint_product_price = null;
        } elseif($nb_paint == 1){
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $shock->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;
        } elseif($nb_paint == 2){
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $shock->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;
        } else {
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $shock->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;
        } 
        
        $all_paint_workforce = Workforce::where(['shock_id' => $shock->id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
        
        if ($all_paint_workforce && $all_paint_workforce->all_paint == true) {
            $paint_product_price = PaintProductPrice::where(['paint_type_id' => $shock->paint_type_id, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()->value ?? 0;
        }

        $total_paint_product_amount_excluding_tax = $paint_product_price ? ceil($paint_product_price * Workforce::where(['shock_id' => $shock->id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->sum('nb_hours')) : 0;
        $total_paint_product_amount_tax = ceil((config('services.settings.tax_rate') * $total_paint_product_amount_excluding_tax) / 100);
        $total_paint_product_amount = ceil($total_paint_product_amount_excluding_tax + $total_paint_product_amount_tax);

        $total_small_supply_amount_excluding_tax = ceil(($total_new_amount_excluding_tax + $total_workforce_amount_excluding_tax + $total_paint_product_amount_excluding_tax + $total_recovery_amount_excluding_tax) * (config('services.settings.small_supply_rate') / 100));
        $total_small_supply_amount_tax = ceil((config('services.settings.tax_rate') * $total_small_supply_amount_excluding_tax) / 100);
        $total_small_supply_amount = ceil($total_small_supply_amount_excluding_tax + $total_small_supply_amount_tax);

        $shock->update([
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

        $total_shock_amount_excluding_tax = ceil(Shock::where('assignment_id', $shock->assignment_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax'));
        $total_shock_amount_tax = ceil(Shock::where('assignment_id', $shock->assignment_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax'));
        $total_shock_amount = ceil(Shock::where('assignment_id', $shock->assignment_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount'));

        $total_other_cost_amount_excluding_tax = OtherCost::where('assignment_id', $shock->assignment_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax');
        $total_other_cost_amount_tax = OtherCost::where('assignment_id', $shock->assignment_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax');
        $total_other_cost_amount = OtherCost::where('assignment_id', $shock->assignment_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount');

        $total_amount_excluding_tax = $total_shock_amount_excluding_tax + $total_other_cost_amount_excluding_tax;
        $total_amount_tax = $total_shock_amount_tax + $total_other_cost_amount_tax;
        $total_amount = $total_shock_amount + $total_other_cost_amount;

        $assignment = Assignment::findOrFail($shock->assignment_id);

        $assignment->update([
            'shock_amount_excluding_tax' => $total_shock_amount_excluding_tax,
            'shock_amount_tax' => $total_shock_amount_tax,
            'shock_amount' => $total_shock_amount,
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
     * Supprimer un travail de choc
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $shockWork = ShockWork::with('shock')
            ->join('shocks', 'shock_works.shock_id', '=', 'shocks.id')
            ->join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('shock_works.id', ShockWork::keyFromHashId($id))
            ->firstOrFail();

        $assignment = Assignment::findOrFail($shockWork->shock->assignment_id);

        $is_validated = false;
        if($assignment->is_validated_by_expert == 1 && $assignment->is_validated_by_repairer == 1){
            $is_validated = true;
        }

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de supprimer un travail de choc", null);
        }

        $shockWork->update([
            'is_before_quote' => $is_validated ? 0 : 1,
            'is_validated' => $is_validated,
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_at' => now(),
            'deleted_by' => auth()->user()->id,
        ]);

        $shockWork->delete();

        $user_entity = Entity::with('entityType:id,code')->findOrFail(auth()->user()->entity_id);
        if($is_validated){
            if($user_entity->entityType->code == EntityTypeEnum::ORGANIZATION){
                $assignment->update([
                    'is_validated_by_expert' => 0,
                ]);
            }
            if($user_entity->entityType->code == EntityTypeEnum::REPAIRER){
                $assignment->update([
                    'is_validated_by_repairer' => 0,
                ]);
            }
        }

        $shock = Shock::find($shockWork->shock_id);

        $shock->update([
            'is_before_quote' => $is_validated ? 0 : 1,
            'is_validated' => $is_validated,
        ]);

        $this->recalculate($shockWork->shock_id);

        return $this->responseDeleted();
    }

    /**
     * Récupérer le prix d'une fourniture par marque et modèle de véhicule
     *
     * @authenticated
     */
    public function get_supply_price_by_vehicle_brand_and_vehicle_model(GetSupplyPriceRequest $request): AnonymousResourceCollection
    {
        $vehicles = Vehicle::where('vehicle_model_id', $request->vehicle_model_id)->get();
        $assignments = Assignment::whereIn('vehicle_id', $vehicles->pluck('id'))->get();
        $shock = Shock::with('assignment:id,reference')->whereIn('assignment_id', $assignments->pluck('id'))->get();
        $shockWorks = ShockWork::with('supply:id,code,label', 'shock.assignment.repairer:id,code,name')->whereIn('shock_id', $shock->pluck('id'))->distinct('supply_id')->latest('created_at')->dynamicPaginate();
        if($request->supply_id && $request->date){
            $shockWorks = ShockWork::with('supply:id,code,label', 'shock.assignment.repairer:id,code,name')->whereIn('shock_id', $shock->pluck('id'))->where('supply_id', $request->supply_id)->where('created_at', '>=', $request->date)->distinct('supply_id')->latest('created_at')->dynamicPaginate();
        }
        if($request->supply_id && !$request->date){
            $shockWorks = ShockWork::with('supply:id,code,label', 'shock.assignment.repairer:id,code,name')->whereIn('shock_id', $shock->pluck('id'))->where('supply_id', $request->supply_id)->distinct('supply_id')->latest('created_at')->dynamicPaginate();
        }
        if($request->date && !$request->supply_id){
            $shockWorks = ShockWork::with('supply:id,code,label', 'shock.assignment.repairer:id,code,name')->whereIn('shock_id', $shock->pluck('id'))->where('created_at', '>=', $request->date)->distinct('supply_id')->latest('created_at')->dynamicPaginate();
        }
        return ShockWorkResource::collection($shockWorks);
    }
}
