<?php

namespace App\Http\Requests\VehicleModel;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleModelRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'brand_id' => $this->brand_id ? Brand::keyFromHashId($this->brand_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id',
        ];
    }
}
