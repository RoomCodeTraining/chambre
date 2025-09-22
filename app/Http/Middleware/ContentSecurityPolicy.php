<?php

namespace App\Http\Middleware;

use Closure;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $csp = "default-src 'self';"
             ."script-src 'self' 'unsafe-inline' 'unsafe-eval' cdn.jsdelivr.net;"
             ."style-src 'self' 'unsafe-inline' fonts.googleapis.com fonts.bunny.net;"
             ."img-src 'self' data:;"
             ."font-src 'self' fonts.gstatic.com fonts.bunny.net;"
             ."connect-src 'self';"
             ."frame-src 'self';";

        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
