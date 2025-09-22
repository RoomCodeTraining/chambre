<?php

namespace App\Http\Requests\OtherCost;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOtherCostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'assignment_id' => ['required', 'exists:assignments,id'],
            'other_cost_type_id' => ['required', 'exists:other_cost_types,id'],
            'amount' => ['required', 'numeric'],
        ];
    }
}
