<?php

namespace App\Actions\User;

use App\Models\User;

class DisableUserAction
{
    public function execute(User $user)
    {
        $user->update(['disabled_at' => now()]);

        return $user->fresh();
    }
}
