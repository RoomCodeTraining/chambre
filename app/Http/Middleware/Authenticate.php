<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    
    protected function redirectTo(Request $request): ?string
    {
        // Ne pas rediriger vers Filament pour Horizon
        if ($request->is('horizon') || $request->is('horizon/*')) {
            return null; // Laravel renverra 401 ou 403 (selon l'accès)
        }
    
        return $request->expectsJson() ? null : route('filament.admin.auth.login');
    }
}
