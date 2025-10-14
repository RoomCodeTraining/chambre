<?php

namespace App\Http\Requests\Assignment;

use App\Models\AssignmentType;
use App\Models\ExpertiseType;
use App\Models\Client;
use App\Models\Vehicle;
use App\Models\RepairerRelationship;
use App\Models\DocumentTransmitted;
use Illuminate\Foundation\Http\FormRequest;

class CalculateAssignmentRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'assignment_type_id' => $this->assignment_type_id ? AssignmentType::keyFromHashId($this->assignment_type_id) : null,
            'expertise_type_id' => $this->expertise_type_id ? ExpertiseType::keyFromHashId($this->expertise_type_id) : null,
            'client_id' => $this->client_id ? Client::keyFromHashId($this->client_id) : null,
            'vehicle_id' => $this->vehicle_id ? Vehicle::keyFromHashId($this->vehicle_id) : null,
            'repairer_relationship_id' => $this->repairer_relationship_id ? RepairerRelationship::keyFromHashId($this->repairer_relationship_id) : null,
            'document_transmitted_id' => $this->document_transmitted_id ? DocumentTransmitted::keyFromHashId($this->document_transmitted_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'assignment_id' => 'required|exists:assignments,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'expertise_date' => 'required|date_format:Y-m-d|before:tomorrow',
            'instructions' => 'nullable|string', // Instructions de l'expert
            'market_incidence_rate' => 'nullable|numeric', // Taux d'incidence marché

            'repairer_relationship_id' => 'nullable|exists:repairer_relationships,id', // Reparateur
            'general_state_id' => 'nullable|exists:general_states,id', // État général
            'claim_nature_id' => 'nullable|exists:claim_natures,id', // Nature du sinistre
            'technical_conclusion_id' => 'nullable|exists:technical_conclusions,id', // Conclusion technique
            'seen_before_work_date' => 'nullable|date_format:Y-m-d', // Date de la visite avant les travaux
            'seen_during_work_date' => 'nullable|date_format:Y-m-d', // Date de la visite pendant les travaux
            'seen_after_work_date' => 'nullable|date_format:Y-m-d', // Date de la visite après les travaux
            'contact_date' => 'nullable|date_format:Y-m-d', // Date de contact
            'expertise_place' => 'nullable|string', // Lieu de l'expertise
            'assured_value' => 'nullable|numeric', // Valeur assurée
            'salvage_value' => 'nullable|numeric', // Valeur de récupération
            'work_duration' => 'nullable|string', // Durée des travaux
            'expert_remark' => 'nullable|string', // Note de l'expert

            'new_market_value' => 'nullable|numeric', 
            'vehicle_new_market_value' => 'nullable|numeric',
            'vehicle_new_market_value_option' => 'nullable|string', 

            'ascertainments' => 'nullable|array',
            'ascertainments.*.ascertainment_type_id' => 'required|exists:ascertainment_types,id|unique:ascertainments,ascertainment_type_id,NULL,id,ascertainment_type_id,' . $this->route('ascertainment_type'),
            'ascertainments.*.very_good' => 'required|boolean',
            'ascertainments.*.good' => 'required|boolean',
            'ascertainments.*.acceptable' => 'required|boolean',
            'ascertainments.*.less_good' => 'required|boolean',
            'ascertainments.*.bad' => 'required|boolean',
            'ascertainments.*.very_bad' => 'required|boolean',
            'ascertainments.*.comment' => 'nullable|string',

            'shocks' => 'nullable|array',
            'shocks.*.shock_point_id' => 'required|exists:shock_points,id|unique:shocks,shock_point_id,NULL,id,assignment_id,' . $this->route('assignment'),
            'shocks.*.shock_works' => 'nullable|array',
            'shocks.*.shock_works.*.supply_id' => 'required|exists:supplies,id|unique:shock_works,supply_id,NULL,id,shock_id,' . $this->route('shock'),
            'shocks.*.shock_works.*.disassembly' => 'required|boolean',
            'shocks.*.shock_works.*.replacement' => 'required|boolean',
            'shocks.*.shock_works.*.repair' => 'required|boolean',
            'shocks.*.shock_works.*.paint' => 'required|boolean',
            'shocks.*.shock_works.*.control' => 'required|boolean',
            'shocks.*.shock_works.*.comment' => 'nullable|string',
            'shocks.*.shock_works.*.obsolescence_rate' => 'required|numeric|min:0|max:100',
            'shocks.*.shock_works.*.recovery_amount' => 'required|numeric',
            'shocks.*.shock_works.*.discount' => 'required|numeric|min:0|max:100',
            'shocks.*.shock_works.*.amount' => 'required|numeric',

            'shocks.*.paint_type_id' => 'required|exists:paint_types,id',
            'shocks.*.hourly_rate_id' => 'required|exists:hourly_rates,id',
            'shocks.*.with_tax' => 'required|boolean',

            'shocks.*.workforces' => 'nullable|array',
            'shocks.*.workforces.*.workforce_type_id' => 'required|exists:workforce_types,id|unique:workforces,workforce_type_id,NULL,id,shock_id,' . $this->route('shock'),
            'shocks.*.workforces.*.nb_hours' => 'required|numeric',
            'shocks.*.workforces.*.discount' => 'required|numeric|min:0|max:100',
            'shocks.*.workforces.*.all_paint' => 'nullable|boolean',

            'other_costs' => 'nullable|array',
            'other_costs.*.other_cost_type_id' => 'required|exists:other_cost_types,id|unique:other_costs,other_cost_type_id,NULL,id,assignment_id,' . $this->route('assignment'),
            'other_costs.*.amount' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'expertise_date.date' => 'La date est invalide.',
            'expertise_date.date_format' => 'Le format de la date est invalide.',
            'seen_before_work_date.date' => 'La date est invalide.',
            'seen_before_work_date.date_format' => 'Le format de la date est invalide.',
            'seen_during_work_date.date' => 'La date est invalide.',
            'seen_during_work_date.date_format' => 'Le format de la date est invalide.',
            'seen_after_work_date.date' => 'La date est invalide.',
            'seen_after_work_date.date_format' => 'Le format de la date est invalide.',
            'contact_date.date' => 'La date est invalide.',
            'contact_date.date_format' => 'Le format de la date est invalide.',
            'repairer_relationship_id.exists' => 'Le réparateur est invalide.',
            'general_state_id.exists' => 'L\'état général est invalide.',
            'claim_nature_id.exists' => 'La nature du sinistre est invalide.',
            'technical_conclusion_id.exists' => 'La conclusion technique est invalide.',
            'report_remark_id.exists' => 'La note de l\'expert dans le rapport est invalide.',
        ];
    }
}
