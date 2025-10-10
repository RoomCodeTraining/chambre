<?php

namespace App\Http\Requests\InsurerRelationship;

use Illuminate\Foundation\Http\FormRequest;

class CreateInsurerRelationshipRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'insurer_id' => 'required|exists:entities,id',
        ];
    }
}
