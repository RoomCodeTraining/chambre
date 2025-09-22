<?php

namespace App\Http\Requests\VehicleModel;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleModelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('vehicle_models', 'label')->ignore($this->label, 'label')],
            'description' => ['nullable', 'string'],
            'brand_id' => ['required', 'exists:brands,id'],
        ];
    }
}
