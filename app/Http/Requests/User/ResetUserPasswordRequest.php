<?php

namespace App\Http\Requests\User;

use App\Models\Office;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class ResetUserPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'regex:' . self::emailRegex(), Rule::unique('users', 'email')->ignore($this->email, 'email')],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:255'],
            'signature' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'current_password' => [
                'sometimes',
                'nullable',
                'string',
                'max:100',
                // Password::default()->min(12)->mixedCase()->numbers()->uncompromised(),
            ],
            'password' => [
                'sometimes',
                'nullable',
                'string',
                'max:100',
                // Password::default()->min(12)->mixedCase()->numbers()->uncompromised(),
            ],
            'password_confirmation' => [
                'sometimes',
                'nullable',
                'string',
                'max:100',
                // Password::default()->min(12)->mixedCase()->numbers()->uncompromised(),
            ],
        ];
    }

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
