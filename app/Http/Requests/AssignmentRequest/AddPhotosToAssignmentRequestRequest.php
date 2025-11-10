<?php

namespace App\Http\Requests\AssignmentRequest;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Client;
use App\Models\Entity;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Models\ExpertiseType;
use App\Models\AssignmentType;
use App\Enums\AssignmentTypeEnum;
use App\Models\InsurerRelationship;
use App\Models\RepairerRelationship;
use Illuminate\Foundation\Http\FormRequest;

class AddPhotosToAssignmentRequestRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'assignment_request_id' => $this->assignment_request_id ? AssignmentRequest::keyFromHashId($this->assignment_request_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'assignment_request_id' => 'required|exists:assignment_requests,id',
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages(): array
    {
        return [
            'expert_firm_id.exists' => 'Le cabinet d\'expert est invalide.',
            'assignment_type_id.required' => 'Le type de mission est requis.',
            'assignment_type_id.exists' => 'Le type de mission est invalide.',
            'expertise_type_id.required' => 'Le type d\'expertise est requis.',
            'expertise_type_id.exists' => 'Le type d\'expertise est invalide.',
            'client_id.exists' => 'Le client est invalide.',
            'vehicle_id.required' => 'Le véhicule est requis.',
            'vehicle_id.exists' => 'Le véhicule est invalide.',
            'insurer_relationship_id.required_if' => 'L\'assureur est requis pour une mission de type compagnie.',
            'insurer_relationship_id.exists' => 'L\'assureur est invalide.',
            'repairer_relationship_id.required_if' => 'Le repaireur est requis pour une mission de type réparateur.',
            'repairer_relationship_id.exists' => 'Le repaireur est invalide.',
            'policy_number.string' => 'Le numéro de police est invalide.',
            'claim_number.string' => 'Le numéro de sinistre est invalide.',
            'claim_date.date' => 'La date est invalide.',
            'claim_date.date_format' => 'Le format de la date est invalide.',
            'expertise_place.string' => 'Le lieu est invalide.',
            'new_market_value.numeric' => 'La valeur neuve est invalide.',
            'photos.array' => 'Les photos sont invalides.',
            'photos.*.image' => 'La photo doit être une image.',
            'photos.*.mimes' => 'La photo doit être une image du format :values.',
        ];
    }
}
