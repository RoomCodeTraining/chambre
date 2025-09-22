<?php

namespace App\Http\Requests\User;

use App\Models\Office;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // 'username' => ['sometimes', 'nullable', 'string', 'max:255', 'unique:users,username'],
            'code' => ['required', 'string', 'max:255', 'unique:users,code'],
            'email' => ['required', 'string', 'regex:' . self::emailRegex(), 'max:255', 'unique:users,email'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:255'],
            'entity_id' => ['required', 'exists:entities,id'],
            'role' => ['required', 'exists:roles,name'],
            'password' => [
                'sometimes',
                'nullable',
                'string',
                'max:100',
                // Password::default()->min(12)->mixedCase()->numbers()->uncompromised(),
            ],
        ];
    }

    // Regex for email address (RFC 5322 Official Standard, simplified for most use cases)
    public function messages(): array
    {
        return [
            'email.regex' => 'L\'adresse email doit être valide.',
        ];
    }

    public static function emailRegex(): string
    {
        return '/^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/';
    }
}
