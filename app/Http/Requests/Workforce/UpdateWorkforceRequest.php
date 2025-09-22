<?php

namespace App\Http\Requests\Workforce;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkforceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'workforce_type_id' => ['required', 'exists:workforce_types,id', Rule::unique('workforces', 'workforce_type_id')->ignore($this->workforce_type_id, 'workforce_type_id')],
            'hourly_rate_id' => ['required', 'exists:hourly_rates,id'],
            'paint_type_id' => ['required', 'exists:paint_types,id'],
            'with_tax' => ['required', 'boolean'],
            'nb_hours' => ['required', 'numeric'],
            'discount' => ['required', 'numeric', 'min:0', 'max:100'],
            'with_tax' => ['required', 'boolean'],
            'all_paint' => ['nullable', 'boolean'],
        ];
    }
}
