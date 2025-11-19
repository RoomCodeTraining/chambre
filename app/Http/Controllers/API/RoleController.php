<?php

namespace App\Http\Controllers\API;

use App\Enums\RoleEnum as EnumsRole;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Models\OrganizationType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\Permission\Models\Role;
use App\Models\Role as AppRole;

/**
 * @group Gestion des profils utilisateur
 *
 * API pour la gestion des profils utilisateurs
 */
class RoleController extends Controller
{
    /**
     * Lister les profils utilisateur
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $currentUser = $request->user();

        $role = Role::where('id', $currentUser->current_role_id)->first()->name;

        $users = Role::query()
            ->when($role == EnumsRole::SYSTEM_ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::SYSTEM_ADMIN, EnumsRole::ADMIN, EnumsRole::EXPERT_ADMIN, EnumsRole::CEO, EnumsRole::EXPERT_MANAGER, EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::EXPERT_ADMIN, EnumsRole::CEO, EnumsRole::EXPERT_MANAGER, EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::EXPERT_ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::CEO, EnumsRole::EXPERT_MANAGER, EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::CEO->value, fn ($query) => $query->whereIn('name', [EnumsRole::EXPERT_MANAGER, EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::EXPERT_MANAGER->value, fn ($query) => $query->whereIn('name', [EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::EDITOR_MANAGER->value, fn ($query) => $query->whereIn('name', [EnumsRole::EDITOR, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::INSURER_ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER]))
            ->when($role == EnumsRole::REPAIRER_ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->paginate($request->input('per_page', 25));

        return RoleResource::collection($users);
    }

    /**
     * Lister les profils utilisateur
     */
    public function list(): AnonymousResourceCollection
    {
        $roles = AppRole::with(['permissions'])
            ->accessibleBy(auth()->user())
            ->latest('created_at')
            ->useFilters()
            ->dynamicPaginate();

        return RoleResource::collection($roles);
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'sanctum',
        ]);

        return new RoleResource($role);

        return response()->json(['message' => 'Role created successfully'], 201);
    }

    public function update(Request $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
        ]);

        return new RoleResource($role);
    }

    public function givePermissionToRole(Request $request, Role $role)
    {
        $role->givePermissionTo($request->permissions);

        return response()->json(['message' => 'Permission added to role successfully'], 200);
    }

    public function revokePermissionToRole(Request $request, Role $role)
    {
        $role->revokePermissionTo($request->permissions);

        return response()->json(['message' => 'Permission revoked from role successfully'], 200);
    }
}
