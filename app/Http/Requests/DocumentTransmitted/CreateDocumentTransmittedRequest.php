<?php

namespace App\Http\Requests\DocumentTransmitted;

use Illuminate\Foundation\Http\FormRequest;

class CreateDocumentTransmittedRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:document_transmitteds,label',
            'description' => 'nullable|string',
        ];
    }
}
