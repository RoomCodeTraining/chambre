<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Entity;
use App\Models\Status;
use App\Models\Vehicle;
use App\Enums\StatusEnum;
use App\Models\Assignment;
use App\Models\EntityType;
use App\Enums\EntityTypeEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Statistiques du tableau de bord
 */
class DashboardController extends Controller
{
    use ApiResponse;

    /**
     * Afficher les statistiques des utilisateurs
     */
    public function users() : JsonResponse
    {
        // $this->authorize('viewAny', User::class);

        return $this->responseSuccess(null, [
            'total_users' => ['value' => User::accessibleBy(auth()->user())->count()],
            'active_users' => ['value' => User::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
            'inactive_users' => ['value' => User::where('status_id', Status::where('code', StatusEnum::INACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
        ]);
    }

    /**
     * Afficher les statistiques des dossiers
     */
    public function assignments() : JsonResponse
    {
        // $this->authorize('viewAny', Assignment::class);

        return $this->responseSuccess(null, [
            'total_assignments' => ['value' => Assignment::accessibleBy(auth()->user())->count()],
            'open_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::OPENED)->first()->id)->accessibleBy(auth()->user())->count()],
            'realized_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::REALIZED)->first()->id)->accessibleBy(auth()->user())->count()],
            'edited_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::EDITED)->first()->id)->count()],
            'validated_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::VALIDATED)->first()->id)->accessibleBy(auth()->user())->count()],
            'paid_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::PAID)->first()->id)->accessibleBy(auth()->user())->count()],
            'closed_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::CLOSED)->first()->id)->accessibleBy(auth()->user())->count()],
            'cancelled_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::CANCELLED)->first()->id)->count()],

            'assignments_edition_time_expired' => Assignment::where('created_at', '<', Carbon::now()->subHours(24))->accessibleBy(auth()->user())->count(),
            'assignments_recovery_time_expired' => Assignment::where('created_at', '<', Carbon::now()->subHours(48))->accessibleBy(auth()->user())->count(),
        ]);
    }

    /**
     * Afficher les statistiques des compagnies d'assurance
     */
    public function insurers() : JsonResponse
    {
        // $this->authorize('viewAny', User::class);

        return $this->responseSuccess(null, [
            'total_insurers' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::INSURER)->first()->id)->accessibleBy(auth()->user())->count()],
            'active_insurers' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::INSURER)->first()->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
            'inactive_insurers' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::INSURER)->first()->id)->where('status_id', Status::where('code', StatusEnum::INACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
        ]);
    }

    /**
     * Afficher les statistiques des réparateurs
     */
    public function repairers() : JsonResponse
    {
        // $this->authorize('viewAny', User::class);

        return $this->responseSuccess(null, [
            'total_repairers' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::REPAIRER)->first()->id)->accessibleBy(auth()->user())->count()],
            'active_repairers' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::REPAIRER)->first()->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
            'inactive_repairers' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::REPAIRER)->first()->id)->where('status_id', Status::where('code', StatusEnum::INACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
        ]);
    }

    /**
     * Afficher les statistiques des véhicules
     */
    public function vehicles() : JsonResponse
    {
        // $this->authorize('viewAny', User::class);

        return $this->responseSuccess(null, [
            'total_vehicles' => ['value' => Vehicle::accessibleBy(auth()->user())->count()],
            'active_vehicles' => ['value' => Vehicle::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
            'inactive_vehicles' => ['value' => Vehicle::where('status_id', Status::where('code', StatusEnum::INACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
        ]);
    }
}
