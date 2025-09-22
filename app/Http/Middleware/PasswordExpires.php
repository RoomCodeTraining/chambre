<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Essa\APIToolKit\Api\ApiResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PasswordExpires.
 */
class PasswordExpires
{
    use ApiResponse;

    /**
     * @return \Illuminate\Http\RedirectResponse|mixed
     *
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        if (! auth()->check()) {
            return $next($request);
        }

        if (is_numeric(config('security.password_expires_days'))) {
            $password_changed_at = new Carbon($request->user()->password_changed_at ?? $request->user()->created_at);

            if (now()->diffInDays($password_changed_at) >= config('security.password_expires_days')) {
                return $this->responseWithCustomError(__('Password expired'), __('Your password has expired.'), Response::HTTP_UNAUTHORIZED);
            }
        }

        return $next($request);
    }
}
