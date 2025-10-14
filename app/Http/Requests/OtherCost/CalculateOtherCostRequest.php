<?php

namespace App\Http\Requests\OtherCost;

use App\Models\Assignment;
use App\Models\HourlyRate;
use App\Models\PaintType;
use App\Models\WorkforceType;
use App\Models\OtherCostType;
use Illuminate\Foundation\Http\FormRequest;

class CalculateOtherCostRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'assignment_id' => $this->assignment_id ? Assignment::keyFromHashId($this->assignment_id) : null,
            'hourly_rate_id' => $this->hourly_rate_id ? HourlyRate::keyFromHashId($this->hourly_rate_id) : null,
            'paint_type_id' => $this->paint_type_id ? PaintType::keyFromHashId($this->paint_type_id) : null,
            'workforces.*.workforce_type_id' => $this->workforce_type_id ? WorkforceType::keyFromHashId($this->workforce_type_id) : null,
            'other_costs.*.other_cost_type_id' => $this->other_cost_type_id ? OtherCostType::keyFromHashId($this->other_cost_type_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'assignment_id' => 'required|exists:assignments,id',
            'hourly_rate_id' => 'required|exists:hourly_rates,id',
            'paint_type_id' => 'required|exists:paint_types,id',
            'shock_works' => 'required|array',
            'shock_works.*.obsolescence_rate' => 'required|numeric',
            'shock_works.*.recovery_amount' => 'required|numeric',
            'shock_works.*.amount' => 'required|numeric',
            'shock_works.*.discount' => 'required|numeric',
            'workforces' => 'required|array',
            'workforces.*.workforce_type_id' => 'required|exists:workforce_types,id',
            'workforces.*.nb_hours' => 'required|numeric',
            'workforces.*.discount' => 'required|numeric',
            'other_costs' => 'required|array',
            'other_costs.*.other_cost_type_id' => 'required|exists:other_cost_types,id',
            'other_costs.*.amount' => 'required|numeric|min:0',
        ];
    }
}
