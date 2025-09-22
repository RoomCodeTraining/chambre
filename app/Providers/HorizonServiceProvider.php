<?php

namespace App\Providers;

use App\Enums\RoleEnum;
use Laravel\Horizon\Horizon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();

        // Horizon::routeSmsNotificationsTo('15556667777');
        // Horizon::routeMailNotificationsTo('example@example.com');
        // Horizon::routeSlackNotificationsTo('slack-webhook-url', '#channel');
    }

    /**
     * Register the Horizon gate.
     *
     * This gate determines who can access Horizon in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewHorizon', function (?User $user = null) {
            return true;
            // return in_array($user->current_role_id, [
            //     Role::firstWhere('name', RoleEnum::SYSTEM_ADMIN)->id,
            //     Role::firstWhere('name', RoleEnum::ADMIN)->id,
            // ]);
        });
    }
}
