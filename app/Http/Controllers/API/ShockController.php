<?php

namespace App\Http\Controllers\API;

use App\Models\Shock;
use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\OtherCost;
use App\Models\PaintType;
use App\Models\ShockWork;
use App\Models\Workforce;
use App\Models\Assignment;
use App\Models\HourlyRate;
use App\Enums\PaintTypeEnum;
use Illuminate\Http\Request;
use App\Enums\HourlyRateEnum;
use App\Models\ExpertiseType;
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
use App\Http\Resources\Shock\ShockResource;
use App\Jobs\GenerateExpertiseReportPdfJob;
use App\Services\Receipt\UpdateReceiptService;
use App\Http\Requests\Shock\CreateShockRequest;
use App\Http\Requests\Shock\UpdateShockRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des chocs
 *
 * APIs pour la gestion des chocs
 */

class ShockController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les chocs
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $shocks = Shock::with([
            'shockPoint',
            'shockWorks' => function($query) {
                $query->orderBy('position', 'asc');
            },
            'workforces' => function($query) {
                $query->orderBy('position', 'asc');
            },
        ])
        ->join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
        ->accessibleBy(auth()->user())
        ->useFilters()
        ->orderBy('id', 'asc')
        ->dynamicPaginate();

        return ShockResource::collection($shocks);
    }

    /**
     * Ajouter un choc
     *
     * @authenticated
     */
    public function store(CreateShockRequest $request): JsonResponse
    {
        $assignment = Assignment::accessibleBy(auth()->user())
            ->where('assignments.id', $request->assignment_id)
            ->firstOrFail();

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible d'ajouter un choc", null);
        }

        $is_validated = false;
        if($assignment->is_validated_by_expert == 1 && $assignment->is_validated_by_repairer == 1){
            $is_validated = true;
        }

        $shocks = $request->get('shocks');

        if(count($shocks) > 0){
            $shock_position = Shock::where('assignment_id', $assignment->id)->count() + 1;
            foreach ($shocks as $data) {
                $shock = Shock::create([
                    'assignment_id' => $assignment->id,
                    'shock_point_id' => $data['shock_point_id'],
                    'paint_type_id' => $data['paint_type_id'] ?? null,
                    'hourly_rate_id' => $data['hourly_rate_id'] ?? null,
                    'with_tax' => (
                    $data['with_tax'] ?? false),
                    'position' => $shock_position,
                    'is_before_quote' => $is_validated ? 0 : 1,
                    'is_validated' => 0,
                    'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);

                if(isset($data['shock_works']) && count($data['shock_works']) > 0){
                    $shock_work_position = ShockWork::where('shock_id', $shock->id)->count() + 1;
                    
                    foreach ($data['shock_works'] as $item) {
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
                        if($request->expertise_type_id == ExpertiseType::where('code', ExpertiseTypeEnum::EVALUATION)->first()->id || $request->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::EVALUATION)->first()->id){
                            $new_amount_tax = 0;
                        } else {
                            $new_amount_tax = ceil((config('services.settings.tax_rate') * $new_amount_excluding_tax) / 100);
                        }                        
                        $new_amount = ceil($new_amount_excluding_tax + $new_amount_tax);
                        
                        $shockWork = ShockWork::create([
                            'shock_id' => $shock->id,
                            'supply_id' => $item['supply_id'],
                            'disassembly' => $item['disassembly'],
                            'replacement' => $item['replacement'],
                            'repair' => $item['repair'],
                            'paint' => $item['paint'],
                            'control' => $item['control'],
                            'comment' => $item['comment'],
                            'position' => $shock_work_position,
                            'is_before_quote' => $is_validated ? 0 : 1,
                            'is_validated' => $is_validated,
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
                            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                            'created_by' => auth()->user()->id,
                            'updated_by' => auth()->user()->id,
                        ]);
                        $shock_work_position++;
                    }
        
                }

                $nb_paint = ShockWork::where(['shock_id' => $shock->id, 'paint' => 1])->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('paint');
                $all_paint = false;
    
                if(isset($data['workforces']) && count($data['workforces']) > 0){
                    $workforce_position = Workforce::where('shock_id', $shock->id)->count() + 1;
                    foreach ($data['workforces'] as $item) {
                        if($item['workforce_type_id'] == WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id){
                            $hourlyRateId = $data['hourly_rate_id'] ?? null;
                            $paintTypeId = $data['paint_type_id'] ?? null;
                            
                            if($hourlyRateId && $paintTypeId){
                                if($nb_paint == 1){
                                    $painting_price = PaintingPrice::where(['hourly_rate_id' => $hourlyRateId, 'paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                                } elseif($nb_paint == 2){
                                    $painting_price = PaintingPrice::where(['hourly_rate_id' => $hourlyRateId, 'paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                                } else {
                                    $painting_price = PaintingPrice::where(['hourly_rate_id' => $hourlyRateId, 'paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                                } 
                                
                                if (($item['all_paint'] ?? false) == true) {
                                    $all_paint = true;
                                    $painting_price = PaintingPrice::where(['hourly_rate_id' => $hourlyRateId, 'paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
                                }
                            } else {
                                $painting_price = null;
                            }
        
                            $total = $painting_price ? $item['nb_hours'] * $painting_price->param_1 + $painting_price->param_2 : 0;
                            
                        } else {
                            $hourlyRateValue = $hourlyRateId ? HourlyRate::where(['id' => $hourlyRateId, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value : 0;
                            $total = $item['nb_hours'] * ($hourlyRateValue ?? 0);
                        }

                        $amount_excluding_tax = ceil($total - ($total * $item['discount'] / 100));
                        if(!($data['with_tax'] ?? false)){
                            $amount_tax = 0;
                        } else {
                            $amount_tax = ceil((config('services.settings.tax_rate') * $amount_excluding_tax) / 100);
                        }
                        $amount = ceil($amount_excluding_tax + $amount_tax);
            
                        $workFeeValue = $hourlyRateId ? HourlyRate::where(['id' => $hourlyRateId, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value : 0;
                        $workforce = Workforce::create([
                            'shock_id' => $shock->id,
                            'workforce_type_id' => $item['workforce_type_id'],
                            'nb_hours' => $item['nb_hours'],
                            'work_fee' => ceil($workFeeValue ?? 0),
                            'discount' => $item['discount'],
                            'amount_excluding_tax' => $amount_excluding_tax,
                            'amount_tax' => $amount_tax,
                            'amount' => $amount,
                            'position' => $workforce_position,
                            'is_before_quote' => $is_validated ? 0 : 1,
                            'is_validated' => $is_validated,
                            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                            'created_by' => auth()->user()->id,
                            'updated_by' => auth()->user()->id,
                        ]);
                        $workforce_position++;
                    }
                }
    
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
    
                $paint_product_price = 0;
                $paintTypeId = $data['paint_type_id'] ?? null;
                
                if($paintTypeId){
                    if($nb_paint == 1){
                        $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ONE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value ?? 0;
                    } elseif($nb_paint == 2){
                        $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::TWO)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value ?? 0;
                    } elseif($nb_paint >= 3) {
                        $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::THREE)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value ?? 0;
                    } 
                    
                    $all_paint_workforce = Workforce::where(['shock_id' => $shock->id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first();
            
                    if ($all_paint_workforce && $all_paint_workforce->all_paint == true) {
                        $paint_product_price = PaintProductPrice::where(['paint_type_id' => $paintTypeId, 'number_paint_element_id' => NumberPaintElement::where('value', NumberPaintElementEnum::ALL)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first()?->value ?? 0;
                    }
                }
    
                $total_paint_product_amount_excluding_tax = ceil($paint_product_price * Workforce::where(['shock_id' => $shock->id, 'workforce_type_id' => WorkforceType::where('code', WorkforceTypeEnum::PAINT)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->sum('nb_hours'));
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
                $shock_position++;
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
        }

        $this->recalculate($assignment->id);
        
        return $this->responseCreated('Shock created successfully', new ShockResource($shock));
    }

    public function recalculate($id)
    {
        $assignment = Assignment::accessibleBy(auth()->user())
            ->where('assignments.id', $id)
            ->firstOrFail();
        
        $total_shock_amount_excluding_tax = ceil(Shock::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax'));
        $total_shock_amount_tax = ceil(Shock::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax'));
        $total_shock_amount = ceil(Shock::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount'));

        $total_other_cost_amount_excluding_tax = OtherCost::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax');
        $total_other_cost_amount_tax = OtherCost::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax');
        $total_other_cost_amount = OtherCost::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount');

        $total_amount_excluding_tax = $total_shock_amount_excluding_tax + $total_other_cost_amount_excluding_tax;
        $total_amount_tax = $total_shock_amount_tax + $total_other_cost_amount_tax;
        $total_amount = $total_shock_amount + $total_other_cost_amount;

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

        dispatch(new GenerateExpertiseReportPdfJob($assignment));
    }

    /**
     * Ajouter un point à un choc
     *
     * @authenticated
     */
    public function storePoint(CreateShockRequest $request): JsonResponse
    {
        $assignment = Assignment::accessibleBy(auth()->user())
            ->where('assignments.id', $request->assignment_id)
            ->firstOrFail();

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible d'ajouter un point à un choc", null);
        }

        $shocks = $request->get('shocks');

        if(count($shocks) > 0){
            $shock_position = Shock::where('assignment_id', $assignment->id)->count() + 1;
            foreach ($shocks as $data) {
                $shock = Shock::create([
                    'assignment_id' => $assignment->id,
                    'shock_point_id' => $data['shock_point_id'],
                    'paint_type_id' => PaintType::where('code', PaintTypeEnum::ORDINARY)->first()->id,
                    'hourly_rate_id' => HourlyRate::where('code', HourlyRateEnum::ONE)->first()->id,
                    'with_tax' => ($data['with_tax'] ?? false),
                    'position' => $shock_position,
                    'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
                $shock_position++;
            }
        }

        $this->recalculate($assignment->id);
        
        return $this->responseCreated('Shock created successfully', new ShockResource($shock));
    }

    /**
     * Afficher un choc
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $shock = Shock::accessibleBy(auth()->user())
            ->join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
            ->where('shocks.id', Shock::keyFromHashId($id))
            ->firstOrFail();

        return $this->responseSuccess(null, new ShockResource($shock->load('shockPoint', 'shockWorks', 'workforces')));
    }

    /**
     * Mettre à jour un choc
     *
     * @authenticated
     */
    public function update(UpdateShockRequest $request, $id): JsonResponse
    {
        $shock = Shock::accessibleBy(auth()->user())
            ->join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
            ->where('shocks.id', Shock::keyFromHashId($id))
            ->firstOrFail();

        $assignment = Assignment::findOrFail($shock->assignment_id);

        $is_validated = false;
        if($assignment->is_validated_by_expert == 1 && $assignment->is_validated_by_repairer == 1){
            $is_validated = true;
        }

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de mettre à jour un choc", null);
        }

        $shock->update([
            'shock_point_id' => $request->shock_point_id,
            'is_before_quote' => $is_validated ? 0 : 1,
            'is_validated' => $is_validated,
            'updated_by' => auth()->user()->id,
        ]);

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

        $this->recalculate($shock->assignment_id);

        return $this->responseSuccess('Shock updated Successfully', new ShockResource($shock));
    }

    /**
     * Réorganiser les travaux de choc
     *
     * @authenticated
     */
    public function orderShockWorks(Request $request, $id)
    {
        $shock = Shock::accessibleBy(auth()->user())
            ->join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
            ->where('shocks.id', Shock::keyFromHashId($id))
            ->firstOrFail();

        $assignment = Assignment::findOrFail($shock->assignment_id);

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de réorganiser les travaux de choc", null);
        }

        $shock_works = $request->get('shock_works');

        if(count($shock_works) > 0){
            $position = 1;
            for ($i = 0; $i < count($shock_works); $i++) {
                $shockWork = ShockWork::findOrFail($shock_works[$i]);
                $shockWork->update([
                    'position' => $position,
                ]);
                $position++;
            }
        }

        return $this->responseSuccess('Opération effectuée avec succès', $shock);
    }

    /**
     * Réorganiser les main d'oeuvre de choc
     *
     * @authenticated
     */
    public function orderWorkforces(Request $request, $id)
    {
        $shock = Shock::accessibleBy(auth()->user())
            ->join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
            ->where('shocks.id', Shock::keyFromHashId($id))
            ->firstOrFail();

        $assignment = Assignment::findOrFail($shock->assignment_id);

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de réorganiser les main d'oeuvre de choc", null);
        }

        $workforces = $request->get('workforces');

        if(count($workforces) > 0){
            $position = 1;
            for ($i = 0; $i < count($workforces); $i++) {
                $workforce = Workforce::findOrFail($workforces[$i]);
                $workforce->update([
                    'position' => $position,
                ]);
                $position++;
            }
        }

        return $this->responseSuccess('Opération effectuée avec succès', $shock);
    }

    /**
     * Supprimer un choc
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $shock = Shock::accessibleBy(auth()->user())
            ->join('assignments', 'shocks.assignment_id', '=', 'assignments.id')
            ->where('shocks.id', Shock::keyFromHashId($id))
            ->firstOrFail();

        $assignment = Assignment::findOrFail($shock->assignment_id);

        $is_validated = false;
        if($assignment->is_validated_by_expert == 1 && $assignment->is_validated_by_repairer == 1){
            $is_validated = true;
        }

        if($assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id || $assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Impossible de supprimer un choc", null);
        }

        $shock->update([
            'is_before_quote' => $is_validated ? 0 : 1,
            'is_validated' => $is_validated,
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_at' => now(),
            'deleted_by' => auth()->user()->id,
        ]);

        $shockWorks = ShockWork::where('shock_id', $shock->id)->get();
        if(count($shockWorks) > 0){
            foreach($shockWorks as $shockWork){
                $shockWork->update([
                    'is_before_quote' => $is_validated ? 0 : 1,
                    'is_validated' => $is_validated,
                    'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
                    'deleted_at' => now(),
                    'deleted_by' => auth()->user()->id,
                ]);
                $shockWork->delete();
            }
        }

        $workforces = Workforce::where('shock_id', $shock->id)->get();
        if(count($workforces) > 0){
            foreach($workforces as $workforce){
                $workforce->update([
                    'is_before_quote' => $is_validated ? 0 : 1,
                    'is_validated' => $is_validated,
                    'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
                    'deleted_at' => now(),
                    'deleted_by' => auth()->user()->id,
                ]);
                $workforce->delete();
            }
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

        $shock->delete();

        $this->recalculate($assignment->id);

        return $this->responseDeleted();
    }

   
}
