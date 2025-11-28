<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OrganizationType;
use Spatie\Permission\Models\Role;
use App\Enums\RoleEnum as EnumsRole;
use App\Http\Controllers\Controller;
use App\Models\Permission as AppPermission;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\Role\RoleResource;
use App\Http\Resources\Permission\PermissionResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des permissions
 *
 * API pour la gestion des permissions
 */
class PermissionController extends Controller
{
    use ApiResponse;

    /**
     * Lister les permissions
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $currentUser = $request->user();

        $permissions = AppPermission::query()
            // ->when($currentUser->hasRole(EnumsRole::OFFICE_ADMIN->value), fn ($query) => $query->whereIn('name', [EnumsRole::STANDARD_USER]))
            // ->when($currentUser->hasRole(EnumsRole::MAIN_OFFICE_ADMIN->value) && in_array($currentUser->organization->organizationType->code, [OrganizationType::BROKER, OrganizationType::BANCASSURANCE]), function ($query) {
            //     $query->whereIn('name', [EnumsRole::OFFICE_ADMIN, EnumsRole::STANDARD_USER]);
            // })->when($currentUser->hasRole(EnumsRole::MAIN_OFFICE_ADMIN->value) && $currentUser->organization->organizationType->code === OrganizationType::INSURER, function ($query) {
            //     $query->whereIn('name', [EnumsRole::STOCK_MANAGER, EnumsRole::OFFICE_MANAGER, EnumsRole::BROKER_MANAGER, EnumsRole::FINANCE_MANAGER, EnumsRole::OFFICE_ADMIN, EnumsRole::OFFICE_MASTER, EnumsRole::STANDARD_USER]);
            // })
            ->paginate($request->input('per_page', 25));

        return PermissionResource::collection($permissions);
    }

    public function list(Request $request): AnonymousResourceCollection
    {
        $permissions = AppPermission::with(['roles'])
            // ->accessibleBy($request->user())
            ->latest('created_at')
            ->dynamicPaginate();

        return PermissionResource::collection($permissions);
    }

    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'sanctum',
        ]);

        return new PermissionResource($permission);

        return response()->json(['message' => 'Permission created successfully'], 201);
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update([
            'name' => $request->name,
        ]);

        return new PermissionResource($permission);
    }
}
