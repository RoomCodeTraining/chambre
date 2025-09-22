<?php

namespace App\Http\Requests\Assignment;

use Illuminate\Foundation\Http\FormRequest;

class CalculateEvaluationAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'vehicle_id' => 'required|exists:vehicles,id',
            'expertise_date' => 'required|date_format:Y-m-d|before:tomorrow',
            'market_incidence_rate' => 'required|numeric',
            'ascertainments' => 'nullable|array',
            'ascertainments.*.ascertainment_type_id' => 'required|exists:ascertainment_types,id|unique:ascertainments,ascertainment_type_id,NULL,id,assignment_id,' . $this->route('assignment'),
            'ascertainments.*.very_good' => 'required|boolean',
            'ascertainments.*.good' => 'required|boolean',
            'ascertainments.*.acceptable' => 'required|boolean',
            'ascertainments.*.less_good' => 'required|boolean',
            'ascertainments.*.bad' => 'required|boolean',
            'ascertainments.*.very_bad' => 'required|boolean',
            'ascertainments.*.comment' => 'nullable|string',
            
            'shocks' => 'nullable|array',
            'shocks.*.shock_works' => 'nullable|array',
            'shocks.*.shock_works.*.supply_id' => 'required|exists:supplies,id|unique:shock_works,supply_id,NULL,id,shock_id,' . $this->route('shock'),
            'shocks.*.shock_works.*.replacement' => 'required|boolean',
            'shocks.*.shock_works.*.repair' => 'required|boolean',
            'shocks.*.shock_works.*.paint' => 'required|boolean',
            'shocks.*.shock_works.*.control' => 'required|boolean',
            'shocks.*.shock_works.*.comment' => 'nullable|string',
            'shocks.*.shock_works.*.amount' => 'required|numeric',

            'shocks.*.workforces' => 'nullable|array',
            'shocks.*.workforces.*.workforce_type_id' => 'required|exists:workforce_types,id|unique:workforces,workforce_type_id,NULL,id,shock_id,' . $this->route('shock'),
            'shocks.*.workforces.*.amount' => 'required|numeric',

            'other_costs' => 'nullable|array',
            'other_costs.*.other_cost_type_id' => 'required|exists:other_cost_types,id|unique:other_costs,other_cost_type_id,NULL,id,assignment_id,' . $this->route('assignment'),
            'other_costs.*.amount' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'expertise_date.date' => 'La date est invalide.',
            'expertise_date.date_format' => 'Le format de la date est invalide.',
        ];
    }
}
