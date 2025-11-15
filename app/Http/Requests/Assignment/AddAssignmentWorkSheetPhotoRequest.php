<?php

namespace App\Http\Requests\Assignment;

use App\Models\Assignment;
use Illuminate\Foundation\Http\FormRequest;

class AddAssignmentWorkSheetPhotoRequest extends FormRequest
{
    public function prepareForValidation()
    {

    }

    public function rules(): array
    {
        return [
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            
        ];
    }

    public function messages(): array
    {
        return [
            'photos.required' => 'Les photos sont requises.',
            'photos.array' => 'Les photos sont invalides.',
            'photos.*.image' => 'La photo doit être une image.',
            'photos.*.mimes' => 'La photo doit être une image du format jpeg, png, jpg, gif, svg.',
        ];
    }
}
