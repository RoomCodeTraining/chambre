<?php

namespace App\Actions\Auth;

use App\Models\User;

class GenerateTokenAction
{
    public function execute(User $user, string $tokenName, ?int $expiresAtHours = null): array
    {
        $expiresAt = $expiresAtHours ? now()->addHours($expiresAtHours) : null;
        $token = $user->createToken($tokenName, ['*'], $expiresAt)->plainTextToken;

        return ['token' => $token, 'token_name' => $tokenName, 'expires_at' => $expiresAt];
    }
}
