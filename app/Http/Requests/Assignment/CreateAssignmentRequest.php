<?php

namespace App\Http\Requests\Assignment;

use App\Models\AssignmentType;
use App\Enums\AssignmentTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class CreateAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'assignment_type_id' => 'required|exists:assignment_types,id',
            'expertise_type_id' => 'required|exists:expertise_types,id',
            'client_id' => 'nullable|exists:clients,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'vehicle_mileage' => 'nullable|numeric',
            'insurer_relationship_id' => 'nullable|required_if:assignment_type_id,'.AssignmentType::where('code', AssignmentTypeEnum::INSURER)->first()->id.'|exists:insurer_relationships,id',
            'additional_insurer_relationship_id' => 'nullable|exists:insurer_relationships,id',
            'repairer_relationship_id' => 'nullable|exists:repairer_relationships,id',
            'document_transmitted_id' => 'nullable|array',
            'document_transmitted_id.*' => 'required|exists:document_transmitteds,id',

            'policy_number' => 'nullable|string',
            'claim_number' => 'nullable|string',
            // 'claim_number' => 'nullable|string|unique:assignments,claim_number',
            'claim_date' => 'nullable|date_format:Y-m-d',
            'expertise_date' => 'nullable|date_format:Y-m-d',
            'expertise_place' => 'nullable|string',
            'received_at' => 'nullable|date_format:Y-m-d',

            'damage_declared' => 'nullable|string',
            
        ];
    }

    public function messages(): array
    {
        return [
            'insurer_relationship_id.required_if' => 'L\'assureur est requis pour une mission de type compagnie.',
            'repairer_relationship_id.required_if' => 'Le réparateur est requis pour une mission de type réparateur.',
            'additional_insurer_relationship_id.exists' => 'L\'assureur additionnel est invalide.',
            'claim_date.date' => 'La date est invalide.',
            'claim_ends_at.date' => 'La date est invalide.',
            'expertise_date.date' => 'La date est invalide.',
            'received_at.date' => 'La date est invalide.',
            'claim_date.date_format' => 'Le format de la date est invalide.',
            'claim_ends_at.date_format' => 'Le format de la date est invalide.',
            'expertise_date.date_format' => 'Le format de la date est invalide.',
            'received_at.date_format' => 'Le format de la date est invalide.',
            'experts.*.date.date' => 'La date est invalide.',
            'experts.*.date.date_format' => 'Le format de la date est invalide.',
        ];
    }
}
