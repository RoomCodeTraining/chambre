<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\Assignment;
use App\Models\AssignmentMessage;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\AssignmentMessage\AssignmentMessageResource;
use App\Http\Requests\AssignmentMessage\CreateAssignmentMessageRequest;
use App\Http\Requests\AssignmentMessage\UpdateAssignmentMessageRequest;

class AssignmentMessageController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $assignmentMessages = AssignmentMessage::with('assignment', 'createdBy', 'status')
            ->when(request()->has('assignment_id'), function($query){
                $query->where('assignment_id', Assignment::keyFromHashId(request()->assignment_id));
            })
            ->when(request()->has('status_id'), function($query){
                $query->where('status_id', Status::keyFromHashId(request()->status_id));
            })
            ->when(request()->has('created_by'), function($query){
                $query->where('created_by', User::keyFromHashId(request()->created_by));
            })
            ->useFilters()
            ->dynamicPaginate();

        return AssignmentMessageResource::collection($assignmentMessages);
    }

    public function store(CreateAssignmentMessageRequest $request): JsonResponse
    {
        $assignmentMessage = AssignmentMessage::create([
            'assignment_id' => $request->assignment_id,
            'message' => $request->message,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('AssignmentMessage created successfully', new AssignmentMessageResource($assignmentMessage));
    }

    public function show($id): JsonResponse
    {
        $assignmentMessage = AssignmentMessage::with('assignment', 'createdBy', 'status')
            ->findOrFail(AssignmentMessage::keyFromHashId($id));

        return $this->responseSuccess(null, new AssignmentMessageResource($assignmentMessage));
    }

    public function update(UpdateAssignmentMessageRequest $request, $id): JsonResponse
    {
        $assignmentMessage = AssignmentMessage::findOrFail(AssignmentMessage::keyFromHashId($id));

        $assignmentMessage->update([
            'message' => $request->message,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('AssignmentMessage updated Successfully', new AssignmentMessageResource($assignmentMessage));
    }

    public function destroy($id): JsonResponse
    {
        $assignmentMessage = AssignmentMessage::findOrFail(AssignmentMessage::keyFromHashId($id));

        $assignmentMessage->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now(),
        ]);

        return $this->responseDeleted();
    }

   
}
