<?php

namespace App\Http\Requests\Ascertainment;

use Illuminate\Foundation\Http\FormRequest;

class CreateAscertainmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'assignment_id' => 'required|exists:assignments,id',
            'ascertainments' => 'required|array',
            'ascertainments.*.ascertainment_type_id' => 'required|exists:ascertainment_types,id|unique:ascertainments,ascertainment_type_id,NULL,id,assignment_id,' . $this->route('assignment'),
            'ascertainments.*.very_good' => 'required|boolean',
            'ascertainments.*.good' => 'required|boolean',
            'ascertainments.*.acceptable' => 'required|boolean',
            'ascertainments.*.less_good' => 'required|boolean',
            'ascertainments.*.bad' => 'required|boolean',
            'ascertainments.*.very_bad' => 'required|boolean',
            'ascertainments.*.comment' => 'required|string|max:255',
        ];
    }
}
