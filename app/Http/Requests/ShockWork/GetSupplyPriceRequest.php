<?php

namespace App\Http\Requests\ShockWork;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GetSupplyPriceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'vehicle_model_id' => 'required|exists:vehicle_models,id',
            'supply_id' => 'nullable|exists:supplies,id',
            'date' => 'nullable|date_format:Y-m-d|before:tomorrow',
        ];
    }

    public function messages(): array
    {
        return [
            'date.date' => 'La date est invalide.',
            'date.date_format' => 'Le format de la date est invalide.',
        ];
    }
}
