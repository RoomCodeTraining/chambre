<?php

namespace App\Actions\User;

use App\Models\User;

class EnableUserAction
{
    public function execute(User $user)
    {
        $user->update(['disabled_at' => null]);

        return $user->fresh();
    }
}
