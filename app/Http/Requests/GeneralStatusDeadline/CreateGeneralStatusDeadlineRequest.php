<?php

namespace App\Http\Requests\GeneralStatusDeadline;

use Illuminate\Foundation\Http\FormRequest;

class CreateGeneralStatusDeadlineRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'target_status_id' => $this->target_status_id ? Status::keyFromHashId($this->target_status_id) : null,
        ]);
    }
    
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:general_status_deadlines,label',
            'description' => 'nullable|string',
            'time_limit' => 'required|integer|min:0',
            'target_status_id' => 'required|exists:statuses,id',
        ];
    }

    public function messages(): array
    {
        return [
            'label.required' => 'Le label est requis.',
            'label.string' => 'Le label doit être une chaîne de caractères.',
            'label.max' => 'Le label doit contenir au plus 255 caractères.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'time_limit.integer' => 'Le temps limite doit être un nombre entier.',
            'time_limit.min' => 'Le temps limite doit être supérieur à 0.',
            'target_status_id.exists' => 'Le statut cible n\'existe pas.',
        ];
    }
}
