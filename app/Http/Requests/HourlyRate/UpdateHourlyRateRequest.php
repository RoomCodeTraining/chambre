<?php

namespace App\Http\Requests\HourlyRate;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHourlyRateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('hourly_rates', 'label')->ignore($this->label, 'label')],
            'description' => ['nullable', 'string'],
            'value' => ['required', 'numeric'],
        ];
    }
}
