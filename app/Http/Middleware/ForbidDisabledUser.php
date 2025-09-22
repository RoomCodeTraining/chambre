<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForbidDisabledUser
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::firstWhere('email', $request->email);

        if ($user && $user->isDisabled()) {
            $errors = [
                'login' => "Vous n'êtes pas autorisé à accéder à la plateforme",
            ];

            if ($request->expectsJson()) {
                return $this->responseUnAuthorized($errors['login']);
            }

            return redirect()->back(Response::HTTP_FOUND)->withInput()->withErrors($errors['login']);
        }

        return $next($request);
    }
}
