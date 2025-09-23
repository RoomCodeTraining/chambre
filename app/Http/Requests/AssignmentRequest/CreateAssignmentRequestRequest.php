<?php

namespace App\Http\Requests\AssignmentRequest;

use App\Models\AssignmentType;
use App\Enums\AssignmentTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class CreateAssignmentRequestRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'expert_firm_id' => 'nullable|exists:entities,id',
            'assignment_type_id' => 'required|exists:assignment_types,id',
            'expertise_type_id' => 'required|exists:expertise_types,id',
            'client_name' => 'nullable|string',
            'client_phone' => 'nullable|string',
            'client_email' => 'nullable|email',
            'vehicle_license_plate' => 'required|string',
            'vehicle_brand_id' => 'required|exists:brands,id',
            'vehicle_model_id' => 'required|exists:vehicle_models,id',
            'vehicle_color_id' => 'required|exists:colors,id',
            'vehicle_new_market_value' => 'required|numeric',
            'insurer_id' => 'nullable|required_if:assignment_type_id,'.AssignmentType::where('code', AssignmentTypeEnum::INSURER)->first()->id.'|exists:entities,id',
            'repairer_id' => 'nullable|exists:entities,id',

            'policy_number' => 'nullable|string',
            'claim_number' => 'nullable|string|unique:assignment_requests,claim_number',
            'claim_date' => 'nullable|date_format:Y-m-d',
            'expertise_place' => 'nullable|string',
            
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
            'vehicle_mileage.numeric' => 'La mileage est invalide.',
            'insurer_id.required_if' => 'L\'assureur est requis pour une mission de type compagnie.',
            'insurer_id.exists' => 'L\'assureur est invalide.',
            'repairer_id.exists' => 'Le repaireur est invalide.',
            'policy_number.string' => 'Le numéro de police est invalide.',
            'claim_number.string' => 'Le numéro de sinistre est invalide.',
            'claim_date.date' => 'La date est invalide.',
            'claim_date.date_format' => 'Le format de la date est invalide.',
            'expertise_place.string' => 'Le lieu est invalide.',
            'new_market_value.numeric' => 'La valeur neuve est invalide.',
        ];
    }
}
