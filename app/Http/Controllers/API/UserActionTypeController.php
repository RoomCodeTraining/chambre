<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserActionType\UpdateUserActionTypeRequest;
use App\Http\Requests\UserActionType\CreateUserActionTypeRequest;
use App\Http\Resources\UserActionType\UserActionTypeResource;
use App\Models\UserActionType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserActionTypeController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $userActionTypes = UserActionType::useFilters()->dynamicPaginate();

        return UserActionTypeResource::collection($userActionTypes);
    }

    public function store(CreateUserActionTypeRequest $request): JsonResponse
    {
        $userActionType = UserActionType::create($request->validated());

        return $this->responseCreated('UserActionType created successfully', new UserActionTypeResource($userActionType));
    }

    public function show($id): JsonResponse
    {
        $userActionType = UserActionType::findOrFail(UserActionType::keyFromHashId($id));

        return $this->responseSuccess(null, new UserActionTypeResource($userActionType));
    }

    public function update(UpdateUserActionTypeRequest $request, $id): JsonResponse
    {
        $userActionType = UserActionType::findOrFail(UserActionType::keyFromHashId($id));

        $userActionType->update($request->validated());

        return $this->responseSuccess('UserActionType updated Successfully', new UserActionTypeResource($userActionType));
    }

    public function destroy($id): JsonResponse
    {
        $userActionType = UserActionType::findOrFail(UserActionType::keyFromHashId($id));

        // $userActionType->delete();

        return $this->responseDeleted();
    }

   
}
