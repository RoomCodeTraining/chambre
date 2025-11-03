<?php

namespace App\Http\Requests\Photo;

use App\Models\Assignment;
use App\Models\PhotoType;
use Illuminate\Foundation\Http\FormRequest;

class CreateMultiplePhotoRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'assignment_id' => $this->assignment_id ? Assignment::keyFromHashId($this->assignment_id) : null,
            'photo_type_id' => $this->photo_type_id ? PhotoType::keyFromHashId($this->photo_type_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'assignment_id' => 'required|exists:assignments,id',
            'photo_type_id' => 'nullable|exists:photo_types,id',
            // 'photos' => 'required|array',
            // 'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
