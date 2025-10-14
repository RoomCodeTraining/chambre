<?php

namespace App\Http\Requests\InsurerRelationship;

use App\Models\Entity;
use Illuminate\Foundation\Http\FormRequest;

class CreateInsurerRelationshipRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'insurer_id' => $this->insurer_id ? Entity::keyFromHashId($this->insurer_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'insurer_id' => 'required|exists:entities,id',
        ];
    }
}
