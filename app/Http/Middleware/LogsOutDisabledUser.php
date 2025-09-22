<?php

namespace App\Http\Middleware;

use Closure;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogsOutDisabledUser
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $user->isDisabled()) {
            $errors = [
                'login' => "Vous n'êtes pas autorisé à accéder à la plateforme",
            ];

            if ($request->expectsJson()) {
                $user->currentAccessToken()->delete();

                return $this->responseUnAuthorized($errors['login']);
            }

            auth()->logout();

            return redirect()->back(Response::HTTP_FOUND)->withInput()->withErrors($errors);
        }

        return $next($request);
    }
}
