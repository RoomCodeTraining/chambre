<?php

namespace App\Http\Requests\RepairerRelationship;

use App\Models\Entity;
use Illuminate\Foundation\Http\FormRequest;

class CreateRepairerRelationshipRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'repairer_id' => $this->repairer_id ? Entity::keyFromHashId($this->repairer_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'repairer_id' => 'required|exists:entities,id',
        ];
    }
}
