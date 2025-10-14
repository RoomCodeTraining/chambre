<?php

namespace App\Http\Requests\OtherCost;

use App\Models\OtherCostType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOtherCostRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'other_cost_type_id' => $this->other_cost_type_id ? OtherCostType::keyFromHashId($this->other_cost_type_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'other_cost_type_id' => ['required', 'exists:other_cost_types,id'],
            'amount' => ['required', 'numeric'],
        ];
    }
}
