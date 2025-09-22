<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAction\UpdateUserActionRequest;
use App\Http\Requests\UserAction\CreateUserActionRequest;
use App\Http\Resources\UserAction\UserActionResource;
use App\Models\UserAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserActionController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $userActions = UserAction::useFilters()->dynamicPaginate();

        return UserActionResource::collection($userActions);
    }

    public function store(CreateUserActionRequest $request): JsonResponse
    {
        $userAction = UserAction::create($request->validated());

        return $this->responseCreated('UserAction created successfully', new UserActionResource($userAction));
    }

    public function show(UserAction $userAction): JsonResponse
    {
        return $this->responseSuccess(null, new UserActionResource($userAction));
    }

    public function update(UpdateUserActionRequest $request, UserAction $userAction): JsonResponse
    {
        $userAction->update($request->validated());

        return $this->responseSuccess('UserAction updated Successfully', new UserActionResource($userAction));
    }

    public function destroy(UserAction $userAction): JsonResponse
    {
        // $userAction->delete();

        return $this->responseDeleted();
    }

   
}
