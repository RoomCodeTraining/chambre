<?php

namespace App\Http\Requests\RepairerRelationship;

use Illuminate\Foundation\Http\FormRequest;

class CreateRepairerRelationshipRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'repairer_id' => 'required|exists:entities,id',
        ];
    }
}
