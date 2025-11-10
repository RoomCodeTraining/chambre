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
            'photos' => 'req|array',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages(): array
    {
        return [
            'assignment_request_id.required' => 'La demande d\'expertise est requise.',
            'assignment_request_id.exists' => 'La demande d\'expertise est invalide.',
            'photos.required' => 'Les photos sont requises.',
            'photos.array' => 'Les photos sont invalides.',
            'photos.*.required' => 'La photo est requise.',
            'photos.*.image' => 'La photo doit être une image.',
            'photos.*.mimes' => 'La photo doit être une image du format :values.',
        ];
    }
}
