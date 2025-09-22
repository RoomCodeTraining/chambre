<?php

namespace App\Http\Requests\VehicleModel;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleModelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id',
        ];
    }
}
