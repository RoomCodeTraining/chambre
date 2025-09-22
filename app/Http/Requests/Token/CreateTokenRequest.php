<?php

namespace App\Http\Requests\Token;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateTokenRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => User::keyFromHashId($this->user_id),
        ]);
    }

    public function rules(): array
    {
        return [
            'client_name' => ['nullable', 'string', 'max:255'],
            'user_id' => ['required', 'exists:users,id'],
            'expires_at' => ['nullable', 'integer', 'max:255'],
        ];
    }
}
