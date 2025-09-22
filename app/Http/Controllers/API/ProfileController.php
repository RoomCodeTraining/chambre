<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\PermissionRegistrar;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Authentification
 */
class ProfileController extends Controller
{
    use ApiResponse;

    /**
     * Récupérer les informations de l'utilisateur connecté
     */
    public function show(): JsonResponse
    {
        $user = User::with(['currentRole','entity', 'permissions', 'status'])->findOrFail(auth()->user()->id);

        app(PermissionRegistrar::class)->setPermissionsTeamId($user->current_office_id);

        return $this->responseSuccess(null, new UserResource($user));
    }
}
