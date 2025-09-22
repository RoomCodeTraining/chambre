<?php

namespace App\Http\Requests\VehicleAge;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleAgeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => 'required|integer|unique:vehicle_ages,value',
            'label' => 'required|string|max:255|unique:vehicle_ages,label',
            'description' => 'nullable|string',
        ];
    }
}
