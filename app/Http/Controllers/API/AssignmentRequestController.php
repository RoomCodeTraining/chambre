<?php

namespace App\Http\Controllers\API;

use App\Models\Client;
use App\Models\Status;
use App\Models\Vehicle;
use App\Enums\StatusEnum;
use App\Models\AssignmentRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\AssignmentRequest\AssignmentRequestResource;
use App\Http\Requests\AssignmentRequest\CreateAssignmentRequestRequest;
use App\Http\Requests\AssignmentRequest\UpdateAssignmentRequestRequest;

class AssignmentRequestController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $assignmentRequests = AssignmentRequest::useFilters()->dynamicPaginate();

        return AssignmentRequestResource::collection($assignmentRequests);
    }

    public function store(CreateAssignmentRequestRequest $request): JsonResponse
    {
        $client = Client::create(
            [
                'name' => $request->client_name,
                'phone_1' => $request->client_phone,
                'email' => $request->client_email,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]
        );

        $vehicle = Vehicle::create(
            [
                'license_plate' => strtoupper(str_replace(' ', '', $request->vehicle_license_plate)),
                'brand_id' => $request->vehicle_brand_id,
                'vehicle_model_id' => $request->vehicle_model_id,
                'color_id' => $request->vehicle_color_id,
                'new_market_value' => $request->vehicle_new_market_value,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]
        );

        $assignmentRequest = AssignmentRequest::create([
            'expert_firm_id' => $request->expert_firm_id,
            'client_id' => $client->id,
            'vehicle_id' => $vehicle->id,
            'insurer_id' => $request->insurer_id,
            'repairer_id' => $request->repairer_id,
            'assignment_type_id' => $request->assignment_type_id,
            'expertise_type_id' => $request->expertise_type_id,
            'policy_number' => $request->policy_number,
            'claim_number' => $request->claim_number,
            'claim_date' => $request->claim_date,
            'expertise_place' => $request->expertise_place,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        // try {
        //     dispatch(new GenerateWorkSheetPdfJob($assignment, false));
        // } catch (\Exception $e) {
        //     Log::error($e);
        // }

        return $this->responseCreated('AssignmentRequest created successfully', new AssignmentRequestResource($assignmentRequest));
    }

    public function show(AssignmentRequest $assignmentRequest): JsonResponse
    {
        return $this->responseSuccess(null, new AssignmentRequestResource($assignmentRequest));
    }

    public function update(UpdateAssignmentRequestRequest $request, AssignmentRequest $assignmentRequest): JsonResponse
    {
        $assignmentRequest->update($request->validated());

        return $this->responseSuccess('AssignmentRequest updated Successfully', new AssignmentRequestResource($assignmentRequest));
    }

    public function destroy(AssignmentRequest $assignmentRequest): JsonResponse
    {
        $assignmentRequest->delete();

        return $this->responseDeleted();
    }

   
}
