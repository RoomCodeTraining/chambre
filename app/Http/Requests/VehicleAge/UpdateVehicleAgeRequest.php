<?php

namespace App\Http\Requests\VehicleAge;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleAgeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => ['required', 'integer', Rule::unique('vehicle_ages', 'value')->ignore($this->value, 'value')],
            'label' => ['required', 'string', 'max:255', Rule::unique('vehicle_ages', 'label')->ignore($this->label, 'label')],
            'description' => ['nullable', 'string'],
        ];
    }
}
