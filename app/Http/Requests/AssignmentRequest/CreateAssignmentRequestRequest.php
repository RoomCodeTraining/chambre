<?php

namespace App\Http\Requests\AssignmentRequest;

use App\Models\AssignmentType;
use App\Enums\AssignmentTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class CreateAssignmentRequestRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'expert_firm_id' => $this->expert_firm_id ? Entity::keyFromHashId($this->expert_firm_id) : null,
            'assignment_type_id' => $this->assignment_type_id ? AssignmentType::keyFromHashId($this->assignment_type_id) : null,
            'expertise_type_id' => $this->expertise_type_id ? ExpertiseType::keyFromHashId($this->expertise_type_id) : null,
            'client_id' => $this->client_id ? Client::keyFromHashId($this->client_id) : null,
            'vehicle_id' => $this->vehicle_id ? Vehicle::keyFromHashId($this->vehicle_id) : null,
            'insurer_id' => $this->insurer_id ? Entity::keyFromHashId($this->insurer_id) : null,
            'repairer_id' => $this->repairer_id ? Entity::keyFromHashId($this->repairer_id) : null,
            'vehicle_brand_id' => $this->vehicle_brand_id ? Brand::keyFromHashId($this->vehicle_brand_id) : null,
            'vehicle_model_id' => $this->vehicle_model_id ? VehicleModel::keyFromHashId($this->vehicle_model_id) : null,
            'vehicle_color_id' => $this->vehicle_color_id ? Color::keyFromHashId($this->vehicle_color_id) : null,

        ]);
    }

    public function rules(): array
    {
        return [
            'expert_firm_id' => 'nullable|exists:entities,id',
            'assignment_type_id' => 'required|exists:assignment_types,id',
            'expertise_type_id' => 'required|exists:expertise_types,id',
            'client_id' => 'nullable|exists:clients,id',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'insurer_id' => 'nullable|exists:entities,id',
            'repairer_id' => 'nullable|exists:entities,id',
            'policy_number' => 'nullable|string',
            'claim_number' => 'nullable|string',
            'claim_date' => 'nullable|date_format:Y-m-d',
            'expertise_place' => 'nullable|string',
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
            'insurer_id.required_if' => 'L\'assureur est requis pour une mission de type compagnie.',
            'insurer_id.exists' => 'L\'assureur est invalide.',
            'repairer_id.exists' => 'Le repaireur est invalide.',
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
