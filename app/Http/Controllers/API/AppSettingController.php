<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppSetting\UpdateAppSettingRequest;
use App\Http\Requests\AppSetting\CreateAppSettingRequest;
use App\Http\Resources\AppSetting\AppSettingResource;
use App\Models\AppSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AppSettingController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $appSettings = AppSetting::useFilters()->dynamicPaginate();

        return AppSettingResource::collection($appSettings);
    }

    public function store(CreateAppSettingRequest $request): JsonResponse
    {
        $appSetting = AppSetting::create($request->validated());

        return $this->responseCreated('AppSetting created successfully', new AppSettingResource($appSetting));
    }

    public function show(AppSetting $appSetting): JsonResponse
    {
        return $this->responseSuccess(null, new AppSettingResource($appSetting));
    }

    public function update(UpdateAppSettingRequest $request, AppSetting $appSetting): JsonResponse
    {
        $appSetting->update($request->validated());

        return $this->responseSuccess('AppSetting updated Successfully', new AppSettingResource($appSetting));
    }

    public function destroy(AppSetting $appSetting): JsonResponse
    {
        // $appSetting->delete();

        return $this->responseDeleted();
    }

   
}
