<?php

namespace App\Http\Requests\Assignment;

use App\Models\Client;
use App\Models\Vehicle;
use App\Models\ExpertiseType;
use App\Models\AssignmentType;
use App\Enums\AssignmentTypeEnum;
use App\Models\AssignmentRequest;
use App\Models\DocumentTransmitted;
use App\Models\InsurerRelationship;
use App\Models\RepairerRelationship;
use Illuminate\Foundation\Http\FormRequest;

class AddCommentAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'comment' => 'required|string',
            
        ];
    }

    public function messages(): array
    {
        return [
            'comment.required' => 'Le champ est requis.',
            'comment.string' => 'Le champ doit être un string.',
        ];
    }
}
