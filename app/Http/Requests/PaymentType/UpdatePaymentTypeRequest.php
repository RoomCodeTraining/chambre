<?php

namespace App\Http\Requests\PaymentType;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('payment_types', 'label')->ignore($this->label, 'label')],
            'description' => 'nullable|string|max:255',
        ];
    }
}
