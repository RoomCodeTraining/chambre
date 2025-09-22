<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'assignment_id' => 'required|exists:assignments,id',
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
