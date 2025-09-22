<?php

namespace App\Http\Requests\Photo;

use Illuminate\Foundation\Http\FormRequest;

class CreatePhotoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'assignment_id' => 'required|exists:assignments,id',
            'photo_type_id' => 'nullable|exists:photo_types,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
