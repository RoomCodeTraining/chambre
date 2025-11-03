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
        if(isset($this->workforces) && is_array($this->workforces)){
            $workforces = [];
            foreach ($this->workforces as $workforce) {
                $workforce['workforce_type_id'] = isset($workforce['workforce_type_id']) && $workforce['workforce_type_id'] ? WorkforceType::keyFromHashId($workforce['workforce_type_id']) : null;
                $workforces[] = $workforce;
            }
        }
        if(isset($this->other_costs) && is_array($this->other_costs)){
            $other_costs = [];
            foreach ($this->other_costs as $other_cost) {
                $other_cost['other_cost_type_id'] = isset($other_cost['other_cost_type_id']) && $other_cost['other_cost_type_id'] ? OtherCostType::keyFromHashId($other_cost['other_cost_type_id']) : null;
                $other_costs[] = $other_cost;
            }
        }
        $this->merge([
            'assignment_id' => $this->assignment_id ? Assignment::keyFromHashId($this->assignment_id) : null,
            'hourly_rate_id' => $this->hourly_rate_id ? HourlyRate::keyFromHashId($this->hourly_rate_id) : null,
            'paint_type_id' => $this->paint_type_id ? PaintType::keyFromHashId($this->paint_type_id) : null,
            'workforces' => $workforces ?? null,
            'other_costs' => $other_costs ?? null,
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

    public function messages(): array
    {
        return [
            'workforces.*.workforce_type_id.exists' => 'Le type de main-d\'œuvre est invalide.',
            'other_costs.*.other_cost_type_id.exists' => 'Le type de charge est invalide.',
            'workforces.*.nb_hours.required' => 'Le nombre d\'heures est requis.',
            'workforces.*.nb_hours.numeric' => 'Le nombre d\'heures doit être un nombre.',
            'workforces.*.discount.required' => 'La remise est requise.',
            'workforces.*.discount.numeric' => 'La remise doit être un nombre.',
            'other_costs.*.amount.required' => 'Le montant est requis.',
            'other_costs.*.amount.numeric' => 'Le montant doit être un nombre.',
            'other_costs.*.amount.min' => 'Le montant doit être supérieur à 0.',
            'other_costs.*.amount.max' => 'Le montant doit être inférieur à 1000000000.',
            'workforces.*.workforce_type_id.required' => 'Le type de main-d\'œuvre est requis.',
            'other_costs.*.other_cost_type_id.required' => 'Le type de charge est requis.',
        ];
    }

    public function attributes(): array
    {
        return [
            'workforces.*.workforce_type_id' => 'type de main-d\'œuvre',
            'other_costs.*.other_cost_type_id' => 'type de charge',
            'workforces.*.nb_hours' => 'nombre d\'heures',
            'workforces.*.discount' => 'remise',
            'other_costs.*.amount' => 'montant',
        ];
    }
}
