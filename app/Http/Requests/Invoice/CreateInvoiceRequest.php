<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // 'assignment_id' => 'required|exists:assignments,id|unique:invoices,assignment_id',
            'assignment_id' => 'required|exists:assignments,id',
            'date' => 'required|date_format:Y-m-d',
            'object' => 'required|string',
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
