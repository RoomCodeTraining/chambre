<?php

namespace App\Http\Requests\VehicleState;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleStateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('vehicle_states', 'label')->ignore($this->label, 'label')],
            'description' => ['nullable', 'string'],
        ];
    }
}
