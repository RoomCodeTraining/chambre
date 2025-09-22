<?php

namespace App\Http\Middleware;

use Closure;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ToBeLoggedOut
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If the user is to be logged out
        if ($request->user() && $request->user()->to_be_logged_out) {
            // Make sure they can log back in next session
            $request->user()->update(['to_be_logged_out' => false]);

            // Kill the current session
            session()->flush();
            auth()->logout();

            return $this->responseSuccess(__('Déconnexion effectuée avec succès'));
        }

        return $next($request);
    }
}
