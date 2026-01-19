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

class RestoreDeletedAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reference' => 'required|string|max:255',
            
        ];
    }

    public function messages(): array
    {
        return [
            'reference.required' => 'Le numéro de dossier est requis.',
            'reference.string' => 'Le numéro de dossier doit être une chaîne de caractères.',
            'reference.max' => 'Le numéro de dossier ne doit pas dépasser 255 caractères.',
        ];
    }
}
