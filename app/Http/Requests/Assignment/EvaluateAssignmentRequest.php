<?php

namespace App\Http\Requests\Assignment;

use Illuminate\Foundation\Http\FormRequest;

class EvaluateAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'instructions' => 'nullable|string', // Instructions de l'expert
            'market_incidence_rate' => 'required|numeric',

            'ascertainments' => 'nullable|array',
            'ascertainments.*.ascertainment_type_id' => 'nullable|exists:ascertainment_types,id|unique:ascertainments,ascertainment_type_id,NULL,id,ascertainment_type_id,' . $this->route('ascertainment_type'),
            'ascertainments.*.very_good' => 'nullable|boolean',
            'ascertainments.*.good' => 'nullable|boolean',
            'ascertainments.*.acceptable' => 'nullable|boolean',
            'ascertainments.*.less_good' => 'nullable|boolean',
            'ascertainments.*.bad' => 'nullable|boolean',
            'ascertainments.*.very_bad' => 'nullable|boolean',
            'ascertainments.*.comment' => 'nullable|string',
            
            'shocks' => 'required|array',
            'shocks.*.shock_point_id' => 'required|exists:shock_points,id|unique:shocks,shock_point_id,NULL,id,shock_point_id,' . $this->route('shock_point'),
            'shocks.*.shock_works' => 'nullable|array',
            'shocks.*.shock_works.*.supply_id' => 'required|exists:supplies,id|unique:shock_works,supply_id,NULL,id,shock_id,' . $this->route('shock'),
            'shocks.*.shock_works.*.replacement' => 'required|boolean',
            'shocks.*.shock_works.*.repair' => 'required|boolean',
            'shocks.*.shock_works.*.paint' => 'required|boolean',
            'shocks.*.shock_works.*.control' => 'required|boolean',
            'shocks.*.shock_works.*.comment' => 'nullable|string',
            'shocks.*.shock_works.*.obsolescence_rate' => 'required|numeric',
            'shocks.*.shock_works.*.recovery_amount' => 'required|numeric',
            'shocks.*.shock_works.*.amount' => 'required|numeric',

            'shocks.*.workforces' => 'nullable|array',
            'shocks.*.workforces.*.workforce_type_id' => 'required|exists:workforce_types,id|unique:workforces,workforce_type_id,NULL,id,workforce_type_id,' . $this->route('workforce_type'),
            'shocks.*.workforces.*.amount' => 'required|numeric',

            'other_costs' => 'nullable|array',
            'other_costs.*.other_cost_type_id' => 'required|exists:other_cost_types,id|unique:other_costs,other_cost_type_id,NULL,id,other_cost_type_id,' . $this->route('other_cost_type'),
            'other_costs.*.amount' => 'required|numeric',
        ];
    }
}
