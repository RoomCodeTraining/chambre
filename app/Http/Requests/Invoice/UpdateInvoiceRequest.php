<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'date' => 'required|date_format:Y-m-d',
            'object' => 'required|string',
            'address' => 'nullable|string',
            'taxpayer_account_number' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'date.date' => 'La date est invalide.',
            'date.date_format' => 'Le format de la date est invalide.',
            'address.string' => 'L\'adresse est invalide.',
            'taxpayer_account_number.string' => 'Le numéro de compte contribuable est invalide.',
        ];
    }
}
