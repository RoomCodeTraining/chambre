<?php

namespace App\Http\Requests\AssignmentType;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssignmentTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:assignment_types,label',
            'description' => 'nullable|string',
        ];
    }
}
