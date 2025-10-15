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
        $assignmentRequests = AssignmentRequest::with('expertFirm','assignmentType', 'expertiseType', 'status', 'deletedBy', 'client', 'vehicle', 'insurer', 'repairer', 'createdBy', 'updatedBy')
                                    ->accessibleBy(auth()->user())
                                    ->useFilters()
                                    ->latest('created_at')
                                    ->dynamicPaginate();

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

        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;
        
        $files = [];
        if($request->hasfile('photos'))
        {
            $count = 0;
            if($request->file('photos') && $request->hasfile('photos')){
                foreach($request->file('photos') as $file)
                {
                    $count = $count + 1;
                    $name = 'IMG_BP'.$today.'_'.$count.'.png';
                    $file->move(public_path("storage/photos/assignment-request/{$assignmentRequest->reference}"), $name);

                    $photo = Photo::create([
                        'name' => $name,
                        'assignment_request_id' => $assignmentRequest->id,
                        'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                        'created_by' => auth()->user()->id,
                        'updated_by' => auth()->user()->id,
                    ]);
                }
            }
        }

        // try {
        //     dispatch(new GenerateWorkSheetPdfJob($assignment, false));
        // } catch (\Exception $e) {
        //     Log::error($e);
        // }

        return $this->responseCreated('AssignmentRequest created successfully', new AssignmentRequestResource($assignmentRequest));
    }

    public function show($id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::findOrFail(AssignmentRequest::keyFromHashId($id));

        return $this->responseSuccess(null, new AssignmentRequestResource($assignmentRequest->load('expertFirm','assignmentType', 'expertiseType', 'status', 'deletedBy', 'client', 'vehicle', 'insurer', 'repairer', 'createdBy', 'updatedBy')));
    }

    public function update(UpdateAssignmentRequestRequest $request, $id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::findOrFail(AssignmentRequest::keyFromHashId($id));

        $assignmentRequest->update($request->validated());

        return $this->responseSuccess('AssignmentRequest updated Successfully', new AssignmentRequestResource($assignmentRequest));
    }

    public function destroy($id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::findOrFail(AssignmentRequest::keyFromHashId($id));

        $assignmentRequest->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_at' => now(),
            'deleted_by' => auth()->user()->id,
        ]);

        return $this->responseDeleted();
    }

   
}
