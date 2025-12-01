<?php

namespace App\Http\Requests\StatusDeadline;

use Illuminate\Foundation\Http\FormRequest;

class CreateStatusDeadlineRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'general_status_deadline_id' => $this->general_status_deadline_id ? GeneralStatusDeadline::keyFromHashId($this->general_status_deadline_id) : null,
        ]);
    }
    public function rules(): array
    {
        return [
            'time_limit' => 'required|integer|min:0',
            'general_status_deadline_id' => 'required|exists:general_status_deadlines,id',
        ];
    }

    public function messages(): array
    {
        return [
            'time_limit.integer' => 'Le temps limite doit être un nombre entier.',
            'time_limit.min' => 'Le temps limite doit être supérieur à 0.',
            'general_status_deadline_id.exists' => 'Le général de statut de deadline n\'existe pas.',
        ];
    }
}
