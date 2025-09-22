<?php

namespace App\Http\Requests\Photo;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhotoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'photo_type_id' => 'nullable|exists:photo_types,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
