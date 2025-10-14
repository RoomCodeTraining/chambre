<?php

namespace App\Http\Requests\Assignment;

use App\Models\Entity;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRealizedAssignmentRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'repairer_id' => $this->repairer_id ? Entity::keyFromHashId($this->repairer_id) : null,
            'directed_by' => $this->directed_by ? User::keyFromHashId($this->directed_by) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'repairer_id' => 'nullable|exists:entities,id',
            'directed_by' => 'required|exists:users,id',
            'expertise_date' => 'nullable|date_format:Y-m-d',
            'expertise_place' => 'nullable|string',
            'point_noted' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'expertise_date.date' => 'La date est invalide.',
            'expertise_date.date_format' => 'Le format de la date est invalide.',
        ];
    }
}
