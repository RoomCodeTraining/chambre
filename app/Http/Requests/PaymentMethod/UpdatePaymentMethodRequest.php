<?php

namespace App\Http\Requests\PaymentMethod;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentMethodRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('payment_methods', 'label')->ignore($this->label, 'label')],
            'description' => 'nullable|string|max:255',
        ];
    }
}
