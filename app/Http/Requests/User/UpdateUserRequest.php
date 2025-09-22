<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', Rule::unique('users', 'code')->ignore($this->code, 'code')],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'regex:' . self::emailRegex(), 'max:255', 'unique:users,email,' . $this->id],
            'telephone' => ['nullable', 'string', 'max:255'],
            'role' => ['required', 'exists:roles,name'],
            'signature' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
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
