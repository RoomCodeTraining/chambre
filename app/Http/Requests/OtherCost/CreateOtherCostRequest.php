<?php

namespace App\Http\Requests\OtherCost;

use Illuminate\Foundation\Http\FormRequest;

class CreateOtherCostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'assignment_id' => 'required|exists:assignments,id',
            'other_costs' => 'required|array',
            // 'other_costs.*.other_cost_type_id' => 'required|exists:other_cost_types,id',
            'other_costs.*.other_cost_type_id' => 'required',
            'other_costs.*.amount' => 'required|numeric',
        ];
    }

    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //         $assignmentId = $this->input('assignment_id');
    //         $otherCosts = $this->input('other_costs', []);

    //         // Collect all other_cost_type_ids from the request
    //         $typeIds = array_column($otherCosts, 'other_cost_type_id');

    //         // Check for duplicates in the request itself
    //         if (count($typeIds) !== count(array_unique($typeIds))) {
    //             $validator->errors()->add('other_costs', 'Vous ne pouvez pas ajouter deux charges du même type pour le même dossier.');
    //             return;
    //         }

    //         // Check for existing other_costs in DB for this assignment
    //         $existingTypeIds = \App\Models\OtherCost::where('assignment_id', $assignmentId)
    //             ->whereIn('other_cost_type_id', $typeIds)
    //             ->pluck('other_cost_type_id')
    //             ->toArray();

    //         if (!empty($existingTypeIds)) {
    //             $validator->errors()->add('other_costs', 'Une ou plusieurs charges de ce type existent déjà pour ce dossier.');
    //         }
    //     });
    // }

}

