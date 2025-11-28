<?php

namespace App\Http\Controllers\API;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role as AppRole;
use App\Models\OrganizationType;
use Spatie\Permission\Models\Role;
use App\Enums\RoleEnum as EnumsRole;
use App\Http\Controllers\Controller;
use App\Http\Resources\Role\RoleResource;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des profils utilisateur
 *
 * API pour la gestion des profils utilisateurs
 */
class RoleController extends Controller
{
    use ApiResponse;

    /**
     * Lister les profils utilisateur
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $currentUser = $request->user();

        $role = Role::where('id', $currentUser->current_role_id)->first()->name;

        $roles = Role::query()
            ->when($role == EnumsRole::SYSTEM_ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::SYSTEM_ADMIN, EnumsRole::ADMIN, EnumsRole::EXPERT_ADMIN, EnumsRole::CEO, EnumsRole::EXPERT_MANAGER, EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::EXPERT_ADMIN, EnumsRole::CEO, EnumsRole::EXPERT_MANAGER, EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::EXPERT_ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::CEO, EnumsRole::EXPERT_MANAGER, EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::CEO->value, fn ($query) => $query->whereIn('name', [EnumsRole::EXPERT_MANAGER, EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::EXPERT_MANAGER->value, fn ($query) => $query->whereIn('name', [EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::EDITOR_MANAGER->value, fn ($query) => $query->whereIn('name', [EnumsRole::EDITOR, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->when($role == EnumsRole::INSURER_ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER]))
            ->when($role == EnumsRole::REPAIRER_ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->paginate($request->input('per_page', 25));

        return RoleResource::collection($roles);
    }

    /**
     * Lister les profils utilisateur
     */
    public function list(Request $request): AnonymousResourceCollection
    {
        $roles = AppRole::with(['permissions'])
            // ->accessibleBy(auth()->user())
            ->latest('created_at')
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

    public function givePermissionToRole(Request $request, $id)
    {
        $appRole = AppRole::findOrFail(AppRole::keyFromHashId($id));
        $role = Role::where('name', $appRole->name)->first();

        $permissions = [];
        if(count($request->permissions) > 0){
            for ($i = 0; $i < count($request->permissions); $i++) {
                $permission = Permission::accessibleBy(auth()->user())->findOrFail(Permission::keyFromHashId($request->permissions[$i]));
                $permissions[] = $permission->name;
            }
            $role->givePermissionTo($permissions);
        }

        return $this->responseSuccess('Permission added to role successfully', new RoleResource($role));
    }

    public function revokePermissionToRole(Request $request, $id)
    {
        $appRole = AppRole::findOrFail(AppRole::keyFromHashId($id));
        $role = Role::where('name', $appRole->name)->first();

        $permissions = [];
        if(count($request->permissions) > 0){
            for ($i = 0; $i < count($request->permissions); $i++) {
                $permission = Permission::accessibleBy(auth()->user())->findOrFail(Permission::keyFromHashId($request->permissions[$i]));
                $permissions[] = $permission->name;
            }
            $role->revokePermissionTo($permissions);
        }

        return $this->responseSuccess('Permission revoked from role successfully', new RoleResource($role));
    }
}
