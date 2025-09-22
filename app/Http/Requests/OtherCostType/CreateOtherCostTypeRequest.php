<?php

namespace App\Http\Requests\OtherCostType;

use Illuminate\Foundation\Http\FormRequest;

class CreateOtherCostTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:other_cost_types,label',
            'description' => 'nullable|string',
        ];
    }
}
