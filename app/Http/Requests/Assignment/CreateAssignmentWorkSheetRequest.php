<?php

namespace App\Http\Requests\Assignment;

use App\Models\Client;
use App\Models\Remark;
use App\Models\Supply;
use App\Models\Vehicle;
use App\Models\Assignment;
use App\Models\ShockPoint;
use App\Models\ExpertiseType;
use App\Models\AssignmentType;
use App\Enums\AssignmentTypeEnum;
use App\Models\AssignmentRequest;
use App\Models\DocumentTransmitted;
use App\Models\InsurerRelationship;
use App\Models\RepairerRelationship;
use Illuminate\Foundation\Http\FormRequest;

class CreateAssignmentWorkSheetRequest extends FormRequest
{
    public function prepareForValidation()
    {
        if($this->shocks){
            $shocks = [];
            foreach ($this->shocks as $shock) {
                $shock['shock_point_id'] = isset($shock['shock_point_id']) && $shock['shock_point_id'] ? ShockPoint::keyFromHashId($shock['shock_point_id']) : null;
                $shock['paint_type_id'] = isset($shock['paint_type_id']) && $shock['paint_type_id'] ? PaintType::keyFromHashId($shock['paint_type_id']) : null;
                $shock['hourly_rate_id'] = isset($shock['hourly_rate_id']) && $shock['hourly_rate_id'] ? HourlyRate::keyFromHashId($shock['hourly_rate_id']) : null;
                
                $shock_works = [];
                if (isset($shock['shock_works']) && is_array($shock['shock_works'])) {
                    foreach ($shock['shock_works'] as $shock_work) {
                        $shock_work['supply_id'] = isset($shock_work['supply_id']) && $shock_work['supply_id'] ? Supply::keyFromHashId($shock_work['supply_id']) : null;
                        $shock_works[] = $shock_work;
                    }
                }
                $shock['shock_works'] = $shock_works;

                $workforces = [];
                if (isset($shock['workforces']) && is_array($shock['workforces'])) {
                    foreach ($shock['workforces'] as $workforce) {
                        $workforce['workforce_type_id'] = isset($workforce['workforce_type_id']) && $workforce['workforce_type_id'] ? WorkforceType::keyFromHashId($workforce['workforce_type_id']) : null;
                        $workforces[] = $workforce;
                    }
                }
                $shock['workforces'] = $workforces;
                
                $shocks[] = $shock;
            }
        }
        $this->merge([
            'shocks' => $shocks ?? null,
            'work_sheet_remark_id' => $this->work_sheet_remark_id ? Remark::keyFromHashId($this->work_sheet_remark_id) : null,
            'client_id' => $this->client_id ? Client::keyFromHashId($this->client_id) : null,
            'vehicle_id' => $this->vehicle_id ? Vehicle::keyFromHashId($this->vehicle_id) : null,
            'insurer_relationship_id' => $this->insurer_relationship_id ? InsurerRelationship::keyFromHashId($this->insurer_relationship_id) : null,
            'additional_insurer_relationship_id' => $this->additional_insurer_relationship_id ? InsurerRelationship::keyFromHashId($this->additional_insurer_relationship_id) : null,
            'repairer_relationship_id' => $this->repairer_relationship_id ? RepairerRelationship::keyFromHashId($this->repairer_relationship_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'client_id' => 'nullable|exists:clients,id',
            'client_name' => 'required|string',
            'client_phone' => 'nullable|string',
            'client_email' => 'nullable|email',
            'vehicle_id' => 'required|exists:vehicles,id',
            'vehicle_mileage' => 'nullable|numeric',
            'insurer_relationship_id' => 'nullable|required_if:assignment_type_id,'.AssignmentType::where('code', AssignmentTypeEnum::INSURER)->first()->id.'|exists:insurer_relationships,id',
            'additional_insurer_relationship_id' => 'nullable|exists:insurer_relationships,id',
            'repairer_relationship_id' => 'nullable|exists:repairer_relationships,id',
            'document_transmitted_id' => 'nullable|array',
            'document_transmitted_id.*' => 'required|exists:document_transmitteds,id',
            'shocks' => 'nullable|array',
            'shocks.*.shock_point_id' => 'required|exists:shock_points,id',
            'shocks.*.works' => 'required|array',
            'shocks.*.works.*.supply_id' => 'required|exists:supplies,id',
            'shocks.*.works.*.disassembly' => 'required|boolean',
            'shocks.*.works.*.replacement' => 'required|boolean',
            'shocks.*.works.*.repair' => 'required|boolean',
            'shocks.*.works.*.paint' => 'required|boolean',
            'shocks.*.works.*.control' => 'required|boolean',
            'shocks.*.works.*.comment' => 'nullable|string',
            'shocks.*.works.*.obsolescence_rate' => 'required|numeric',
            'shocks.*.works.*.recovery_amount' => 'required|numeric',
            'shocks.*.works.*.amount' => 'required|numeric',
            'shocks.*.works.*.discount' => 'required|numeric',
            'work_sheet_remark_id' => 'nullable|exists:remarks,id',
            'expert_work_sheet_remark' => 'nullable|string',

            'policy_number' => 'nullable|string',
            'claim_number' => 'nullable|string',
            // 'claim_number' => 'nullable|string|unique:assignments,claim_number',
            'claim_date' => 'nullable|date_format:Y-m-d',

            'repairer_signature' => 'required|string',
            'customer_signature' => 'required|string',
            'emails' => 'nullable|array',
            // 'emails.*' => 'nullable|email|distinct',
        ];
    }

    public function messages(): array
    {
        return [
            'client_name.required' => 'Le nom du client est requis.',
            'client_name.string' => 'Le nom du client est invalide.',
            'client_phone.string' => 'Le numéro de téléphone est invalide.',
            'client_email.email' => 'L\'email est invalide.',
            'emails.*.email.distinct' => 'Chaque email doit être unique.',
            'vehicle_id.required' => 'Le véhicule est requis.',
            'vehicle_id.exists' => 'Le véhicule est invalide.',
            'vehicle_mileage.numeric' => 'La distance parcourue est invalide.',
            'insurer_relationship_id.required_if' => 'L\'assureur est requis pour une mission de type compagnie.',
            'insurer_relationship_id.exists' => 'L\'assureur est invalide.',
            'additional_insurer_relationship_id.exists' => 'L\'assureur additionnel est invalide.',
            'repairer_relationship_id.required_if' => 'Le réparateur est requis pour une mission de type réparateur.',
            'repairer_relationship_id.exists' => 'Le réparateur est invalide.',
            'document_transmitted_id.array' => 'Les documents transmis sont invalides.',
            'document_transmitted_id.*.required' => 'Le document transmis est requis.',
            'document_transmitted_id.*.exists' => 'Le document transmis est invalide.',
            'shocks.array' => 'Les points de choc sont invalides.',
            'shocks.*.shock_point_id.required' => 'Le point de choc est requis.',
            'shocks.*.shock_point_id.exists' => 'Le point de choc est invalide.',
            'shocks.*.shock_works.array' => 'Les travaux du point de choc sont invalides.',
            'shocks.*.shock_works.*.supply_id.required' => 'Le matériel est requis.',
            'shocks.*.shock_works.*.supply_id.exists' => 'Le matériel est invalide.',
            'shocks.*.shock_works.*.disassembly.required' => 'La désassemblage est requise.',
            'shocks.*.shock_works.*.disassembly.boolean' => 'La désassemblage est invalide.',
            'shocks.*.shock_works.*.replacement.required' => 'La remplacement est requise.',
            'shocks.*.shock_works.*.replacement.boolean' => 'La remplacement est invalide.',
            'shocks.*.shock_works.*.repair.required' => 'La réparation est requise.',
            'shocks.*.shock_works.*.repair.boolean' => 'La réparation est invalide.',
            'shocks.*.shock_works.*.paint.required' => 'La peinture est requise.',
            'shocks.*.shock_works.*.paint.boolean' => 'La peinture est invalide.',
            'shocks.*.shock_works.*.control.required' => 'Le contrôle est requise.',
            'shocks.*.shock_works.*.control.boolean' => 'Le contrôle est invalide.',
            'shocks.*.shock_works.*.comment.string' => 'La commentaire est invalide.',
            'shocks.*.shock_works.*.obsolescence_rate.numeric' => 'Le taux d\'obsolescence est invalide.',
            'shocks.*.shock_works.*.recovery_amount.numeric' => 'Le montant de récupération est invalide.',
            'shocks.*.shock_works.*.amount.numeric' => 'Le montant est invalide.',
            'shocks.*.shock_works.*.discount.numeric' => 'Le pourcentage de remise est invalide.',
            'work_sheet_remark_id.exists' => 'La note de l\'expert dans la fiche de travaux est invalide.',
            'expert_work_sheet_remark.string' => 'La note de l\'expert dans la fiche de travaux est invalide.',
            'policy_number.string' => 'Le numéro de police est invalide.',
            'claim_number.string' => 'Le numéro de sinistre est invalide.',
            'claim_date.date_format' => 'Le format de la date est invalide.',
            'repairer_signature.required' => 'La signature du réparateur est requise.',
            'repairer_signature.string' => 'La signature du réparateur est invalide.',
            'customer_signature.required' => 'La signature du client est requise.',
            'customer_signature.string' => 'La signature du client est invalide.',
            'emails.array' => 'Les emails sont invalides.',
            'emails.*.email.distinct' => 'Chaque email doit être unique.',
            'emails.*.email.email' => 'L\'email est invalide.',
        ];
    }
}
