<?php

namespace App\Http\Requests\PaymentMethod;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentMethodRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:payment_methods,label',
            'description' => 'nullable|string|max:255',
        ];
    }
}
