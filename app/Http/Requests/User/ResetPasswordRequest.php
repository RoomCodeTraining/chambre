<?php

namespace App\Http\Requests\User;

use App\Models\Office;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ResetPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        try {
            $this->merge([
                'office_id' => Office::keyFromHashId($this->office_id),
            ]);
        } catch (\Throwable $exception) {
        }
    }
}
