<?php

namespace App\Http\Controllers\API;

use App\Enums\EntityTypeEnum;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Comparison;
use App\Models\Entity;
use App\Models\EntityType;
use App\Models\Offer;
use App\Models\Status;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\JsonResponse;

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
            'edited_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::EDITED)->first()->id)->accessibleBy(auth()->user())->count()],
            'validated_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::VALIDATED)->first()->id)->accessibleBy(auth()->user())->count()],
            'paid_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::PAID)->first()->id)->accessibleBy(auth()->user())->count()],
            'closed_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::CLOSED)->first()->id)->accessibleBy(auth()->user())->count()],
            'cancelled_assignments' => ['value' => Assignment::where('status_id', Status::where('code', StatusEnum::CANCELLED)->first()->id)->accessibleBy(auth()->user())->count()],

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
     * Afficher les statistiques des courtiers en assurances
     */
    public function brokers() : JsonResponse
    {
        // $this->authorize('viewAny', User::class);

        return $this->responseSuccess(null, [
            'total_brokers' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::BROKER)->first()->id)->accessibleBy(auth()->user())->count()],
            'active_brokers' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::BROKER)->first()->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
            'inactive_brokers' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::BROKER)->first()->id)->where('status_id', Status::where('code', StatusEnum::INACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
        ]);
    }

    /**
     * Afficher les statistiques des agents généraux
     */
    public function agents() : JsonResponse
    {
        // $this->authorize('viewAny', User::class);

        return $this->responseSuccess(null, [
            'total_agents' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::AGENT)->first()->id)->accessibleBy(auth()->user())->count()],
            'active_agents' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::AGENT)->first()->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
            'inactive_agents' => ['value' => Entity::where('entity_type_id', EntityType::where('code', EntityTypeEnum::AGENT)->first()->id)->where('status_id', Status::where('code', StatusEnum::INACTIVE)->first()->id)->accessibleBy(auth()->user())->count()],
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
            'total_vehicles' => ['value' => Vehicle::count()],
            'active_vehicles' => ['value' => Vehicle::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->count()],
            'inactive_vehicles' => ['value' => Vehicle::where('status_id', Status::where('code', StatusEnum::INACTIVE)->first()->id)->count()],
        ]);
    }

    /**
     * Afficher les statistiques des comparaisons
     */
    public function comparisons() : JsonResponse
    {
        // $this->authorize('viewAny', Comparison::class);

        return $this->responseSuccess(null, [
            'total_comparisons' => ['value' => Comparison::accessibleBy(auth()->user())->count()],
            'total_comparisons_in_progress' => ['value' => Comparison::accessibleBy(auth()->user())->where('status_id', Status::where('code', StatusEnum::IN_PROGRESS)->first()->id)->count()],
            'total_comparisons_closed' => ['value' => Comparison::accessibleBy(auth()->user())->where('status_id', Status::where('code', StatusEnum::CLOSED)->first()->id)->count()],
        ]);
    }

    /**
     * Afficher les statistiques des offres
     */
    public function offers() : JsonResponse
    {
        // $this->authorize('viewAny', Offer::class);

        return $this->responseSuccess(null, [
            'total_offers' => ['value' => Offer::accessibleBy(auth()->user())->count()],
            'total_offers_draft' => ['value' => Offer::accessibleBy(auth()->user())->where('status_id', Status::where('code', StatusEnum::DRAFT)->first()->id)->count()],
            'total_offers_pending' => ['value' => Offer::accessibleBy(auth()->user())->where('status_id', Status::where('code', StatusEnum::PENDING)->first()->id)->count()],
            'total_offers_accepted' => ['value' => Offer::accessibleBy(auth()->user())->where('status_id', Status::where('code', StatusEnum::ACCEPTED)->first()->id)->count()],
            'total_offers_rejected' => ['value' => Offer::accessibleBy(auth()->user())->where('status_id', Status::where('code', StatusEnum::REJECTED)->first()->id)->count()],
        ]);
    }
}
