<?php

namespace App\Http\Requests\HourlyRate;

use Illuminate\Foundation\Http\FormRequest;

class CreateHourlyRateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:hourly_rates,label',
            'description' => 'nullable|string',
            'value' => 'required|numeric|min:0',
        ];
    }
}
