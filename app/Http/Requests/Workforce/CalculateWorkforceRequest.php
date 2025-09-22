<?php

namespace App\Http\Requests\Workforce;

use Illuminate\Foundation\Http\FormRequest;

class CalculateWorkforceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'shock_id' => 'required|exists:shocks,id',
            'hourly_rate_id' => 'required|exists:hourly_rates,id',
            'paint_type_id' => 'required|exists:paint_types,id',
            'shock_works' => 'required|array',
            'shock_works.*.obsolescence_rate' => 'required|numeric',
            'shock_works.*.recovery_amount' => 'required|numeric',
            'shock_works.*.amount' => 'required|numeric',
            'shock_works.*.discount' => 'required|numeric|min:0|max:100',
            'workforces' => 'required|array',
            'workforces.*.workforce_type_id' => 'required|exists:workforce_types,id',
            'workforces.*.nb_hours' => 'required|numeric',
            'workforces.*.discount' => 'required|numeric|min:0|max:100',
            'workforces.*.with_tax' => 'required|boolean',
            'workforces.*.all_paint' => 'nullable|boolean',
        ];
    }
}
