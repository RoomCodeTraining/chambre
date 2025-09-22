<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionsPolicy
{
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var Response $response
         */
        $response = $next($request);

        $response->headers->set(
            key: 'Permissions-Policy',
            values: strval(config('security.headers.permissions-policy')),
        );

        return $response;
    }
}
