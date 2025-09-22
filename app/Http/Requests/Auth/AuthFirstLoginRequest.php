<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class AuthFirstLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'new_password' => [
                'required',
                'sometimes',
                'nullable',
                'string',
                'max:100',
                Password::default()->min(12)->mixedCase()->numbers()->uncompromised()
            ],
            'new_password_confirmation' => [
                'required',
                'sometimes',
                'nullable',
                'string',
                'max:100',
                Password::default()->min(12)->mixedCase()->numbers()->uncompromised()
            ],
        ];
    }
}
