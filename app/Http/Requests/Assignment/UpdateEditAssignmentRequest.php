<?php

namespace App\Http\Requests\Assignment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEditAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // Autres type de dossier
            'repairer_id' => 'nullable|exists:entities,id', // Reparateur
            'general_state_id' => 'nullable|exists:general_states,id', // État général
            'claim_nature_id' => 'nullable|exists:claim_natures,id', // Nature du sinistre
            'technical_conclusion_id' => 'nullable|exists:technical_conclusions,id', // Conclusion technique
            'seen_before_work_date' => 'nullable|date_format:Y-m-d', // Date de la visite avant les travaux
            'seen_during_work_date' => 'nullable|date_format:Y-m-d', // Date de la visite pendant les travaux
            'seen_after_work_date' => 'nullable|date_format:Y-m-d', // Date de la visite après les travaux
            'contact_date' => 'nullable|date_format:Y-m-d', // Date de contact
            'expertise_place' => 'nullable|string', // Lieu de l'expertise
            'assured_value' => 'nullable|numeric', // Valeur assurée
            'salvage_value' => 'nullable|numeric', // Valeur de sauvetage
            'work_duration' => 'nullable|string', // Durée des travaux
            'report_remark_id' => 'nullable|exists:remarks,id', // Note de l'expert dans le rapport à selectionner
            'expert_report_remark' => 'nullable|string', // Note de l'expert dans le rapport
            'vehicle_new_market_value_option' => 'nullable|string', // Option de la valeur neuve du véhicule
            'new_market_value' => 'nullable|numeric', // Valeur neuve du véhicule
            'depreciation_rate' => 'nullable|numeric|min:0|max:100', // Taux de dépréciation
            'market_value' => 'nullable|numeric', // Valeur de marché

            // Evaluation
            'instructions' => 'nullable|string', // Instructions de l'expert
            'market_incidence_rate' => 'nullable|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'seen_before_work_date.date' => 'La date est invalide.',
            'seen_before_work_date.date_format' => 'Le format de la date est invalide.',
            'seen_during_work_date.date' => 'La date est invalide.',
            'seen_during_work_date.date_format' => 'Le format de la date est invalide.',
            'seen_after_work_date.date' => 'La date est invalide.',
            'seen_after_work_date.date_format' => 'Le format de la date est invalide.',
            'contact_date.date' => 'La date est invalide.',
            'contact_date.date_format' => 'Le format de la date est invalide.',
            'depreciation_rate.min' => 'Le taux de dépréciation doit être supérieur ou égal à 0.',
            'depreciation_rate.max' => 'Le taux de dépréciation doit être inférieur ou égal à 100.',
        ];
    }
}
