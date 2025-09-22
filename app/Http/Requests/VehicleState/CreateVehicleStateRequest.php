<?php

namespace App\Http\Requests\VehicleState;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleStateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
