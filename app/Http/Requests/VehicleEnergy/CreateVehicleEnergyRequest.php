<?php

namespace App\Http\Requests\VehicleEnergy;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleEnergyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
