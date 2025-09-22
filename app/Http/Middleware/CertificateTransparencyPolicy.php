<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CertificateTransparencyPolicy
{
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var Response $response
         */
        $response = $next($request);

        $response->headers->set(
            key: 'Expect-CT',
            values: strval(config('security.headers.certificate-transparency')),
        );

        return $response;
    }
}
