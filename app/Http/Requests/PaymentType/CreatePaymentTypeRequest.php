<?php

namespace App\Http\Requests\PaymentType;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:payment_types,label',
            'description' => 'nullable|string|max:255',
        ];
    }
}
