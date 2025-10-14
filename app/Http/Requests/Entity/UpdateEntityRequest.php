<?php

namespace App\Http\Requests\Entity;

use App\Models\EntityType;
use App\Enums\EntityTypeEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEntityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'regex:' . self::emailRegex(), 'string', 'max:255', Rule::unique('entities', 'email')->ignore($this->email, 'email')],
            'telephone' => ['nullable', 'string', 'max:255'],
            'service_description' => ['nullable', 'string'],
            'footer_description' => ['nullable', 'string'],
            'prefix' => ['nullable', 'required_if:entity_type_code,'.EntityType::where('code', EntityTypeEnum::INSURER)->first()->hashId, 'string', 'max:255'],
            'suffix' => ['nullable', 'required_if:entity_type_code,'.EntityType::where('code', EntityTypeEnum::ORGANIZATION)->first()->hashId, 'string', 'max:255'],
            'logo' => ['nullable', 'required_if:entity_type_code,'.EntityType::where('code', EntityTypeEnum::ORGANIZATION)->first()->hashId, 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }

    // Regex for email address (RFC 5322 Official Standard, simplified for most use cases)
    public function messages(): array
    {
        return [
            'email.regex' => 'L\'adresse email doit être valide.',
            'logo.image' => 'Le logo doit être une image.',
            'logo.mimes' => 'Le logo doit être une image de type jpeg, png, jpg, gif ou svg.',
            'prefix.required_if' => 'Le préfixe est requis.',
            'suffix.required_if' => 'Le suffixe est requis.',
        ];
    }

    public static function emailRegex(): string
    {
        return '/^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/';
    }
}
