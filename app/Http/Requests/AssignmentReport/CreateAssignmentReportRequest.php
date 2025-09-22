<?php

namespace App\Http\Requests\AssignmentReport;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssignmentReportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'assignment_id' => 'required|exists:assignments,id',
            'technical_conclusion_id' => 'required|exists:technical_conclusions,id',
            
            
        ];
    }
}
