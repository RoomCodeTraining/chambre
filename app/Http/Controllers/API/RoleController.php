<?php

namespace App\Http\Controllers\API;

use App\Enums\RoleEnum as EnumsRole;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Models\OrganizationType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\Permission\Models\Role;

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

        $users = Role::query()
            ->when($role == EnumsRole::SYSTEM_ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::SYSTEM_ADMIN, EnumsRole::ADMIN, EnumsRole::CEO, EnumsRole::EXPERT_MANAGER, EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER, EnumsRole::UNASSIGNED]))
            ->when($role == EnumsRole::ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::CEO, EnumsRole::EXPERT_MANAGER, EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER, EnumsRole::UNASSIGNED]))
            ->when($role == EnumsRole::CEO->value, fn ($query) => $query->whereIn('name', [EnumsRole::EXPERT_MANAGER, EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER, EnumsRole::UNASSIGNED]))
            ->when($role == EnumsRole::EXPERT_MANAGER->value, fn ($query) => $query->whereIn('name', [EnumsRole::EXPERT, EnumsRole::OPENER, EnumsRole::EDITOR, EnumsRole::VALIDATOR, EnumsRole::ACCOUNTANT_MANAGER, EnumsRole::ACCOUNTANT, EnumsRole::BUSINESS_DEVELOPER, EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER, EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER, EnumsRole::UNASSIGNED]))
            ->when($role == EnumsRole::INSURER_ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::INSURER_ADMIN, EnumsRole::INSURER_STANDARD_USER]))
            ->when($role == EnumsRole::REPAIRER_ADMIN->value, fn ($query) => $query->whereIn('name', [EnumsRole::REPAIRER_ADMIN, EnumsRole::REPAIRER_STANDARD_USER]))
            ->paginate($request->input('per_page', 25));

        return RoleResource::collection($users);
    }
}
