<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentTypeOptions
{
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var Response $response
         */
        $response = $next($request);

        $response->headers->set(
            key: 'X-Content-Type-Options',
            values: strval(config('security.headers.content-type-options')),
        );

        return $response;
    }
}
