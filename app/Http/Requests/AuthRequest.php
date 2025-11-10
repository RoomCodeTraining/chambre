<?php

namespace App\Http\Requests;

use App\Rules\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $routeName = $this->route()->getName();

        return match ($routeName) {
            'auth.authenticate' => $this->getLoginRules(),
            'auth.store' => $this->getLoginRules(),
            'auth.revoke' => $this->getRevokeAccessRules(),
            'auth.welcome.resend' => $this->getWelcomeResendRules(),
            'auth.password.set' => $this->getSetPasswordRules(),
            'auth.password.forgot' => $this->getForgotPasswordRules(),
            'auth.password.reset' => $this->getResetPasswordRules(),
            'auth.register' => $this->getRegisterRules(),
            default => []
        };
    }

    /**
     * Get the login rules
     */
    private function getLoginRules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'expires_at' => ['nullable', 'integer'],
        ];
    }

    /**
     * Get revoke access rules
     */
    private function getRevokeAccessRules(): array
    {
        return [
            'token_ids' => ['required', 'array'],
            'token_ids.*' => ['required'],
        ];
    }

    /**
     * Get set password rules
     */
    private function getWelcomeResendRules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
        ];
    }

    /**
     * Get set password rules
     */
    private function getSetPasswordRules(): array
    {
        return [
            'password' => [
                'required',
                'string',
                'confirmed',
                'max:100',
                Password::default()->min(12)->mixedCase()->numbers()->uncompromised(),
            ],
        ];
    }

    /**
     * Get forgot password rules
     */
    private function getForgotPasswordRules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
        ];
    }

    /**
     * Get forgot password rules
     */
    private function getResetPasswordRules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email', 'exists:users,email'],
            // 'password' => ['string', 'nullable', 'confirmed', 'max:100', Password::default()->min(12)->mixedCase()->numbers()->uncompromised(), new UnusedPassword($this->email)],
            'password' => ['string', 'nullable', 'min:8', 'max:100'],
            'client_name' => ['nullable', 'string', 'max:255'],
        ];
    }

    /**
     * Get register user rules
     */
    private function getRegisterRules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:users,email'],
            'first_name' => ['string', 'required', 'max:255'],
            'last_name' => ['string', 'required', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'password' => ['string', 'required', 'confirmed', 'max:100', Password::default()->min(12)->mixedCase()->numbers()->uncompromised(), new UnusedPassword($this->email)],
        ];
    }

    /**
     * Custom validation messages
     */
    public function messages(): array
    {
        return [
            'email.exists' => 'The :attribute is not registered',
        ];
    }
}
