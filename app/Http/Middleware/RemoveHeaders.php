<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var Response $response
         */
        $response = $next($request);

        /**
         * @var string $header
         */
        foreach ((array) config('security.headers.remove') as $header) {
            header_remove($header);

            $response->headers->remove(
                key: $header,
            );
        }

        return $response;
    }
}
