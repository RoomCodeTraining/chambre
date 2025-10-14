<?php

namespace App\Http\Requests\Payment;

use App\Models\PaymentType;
use App\Models\PaymentMethod;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'payment_type_id' => $this->payment_type_id ? PaymentType::keyFromHashId($this->payment_type_id) : null,
            'payment_method_id' => $this->payment_method_id ? PaymentMethod::keyFromHashId($this->payment_method_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'payment_type_id' => 'required|exists:payment_types,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'date' => 'required|date_format:Y-m-d',
            'amount' => 'required|numeric',
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
