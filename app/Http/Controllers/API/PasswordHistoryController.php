<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordHistory\UpdatePasswordHistoryRequest;
use App\Http\Requests\PasswordHistory\CreatePasswordHistoryRequest;
use App\Http\Resources\PasswordHistory\PasswordHistoryResource;
use App\Models\PasswordHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PasswordHistoryController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $passwordHistories = PasswordHistory::useFilters()->dynamicPaginate();

        return PasswordHistoryResource::collection($passwordHistories);
    }

    public function store(CreatePasswordHistoryRequest $request): JsonResponse
    {
        $passwordHistory = PasswordHistory::create($request->validated());

        return $this->responseCreated('PasswordHistory created successfully', new PasswordHistoryResource($passwordHistory));
    }

    public function show($id): JsonResponse
    {
        $passwordHistory = PasswordHistory::findOrFail(PasswordHistory::keyFromHashId($id));

        return $this->responseSuccess(null, new PasswordHistoryResource($passwordHistory));
    }

    public function update(UpdatePasswordHistoryRequest $request, $id): JsonResponse
    {
        $passwordHistory = PasswordHistory::findOrFail(PasswordHistory::keyFromHashId($id));

        $passwordHistory->update($request->validated());

        return $this->responseSuccess('PasswordHistory updated Successfully', new PasswordHistoryResource($passwordHistory));
    }

    public function destroy($id): JsonResponse
    {
        $passwordHistory = PasswordHistory::findOrFail(PasswordHistory::keyFromHashId($id));

        // $passwordHistory->delete();

        return $this->responseDeleted();
    }

   
}
