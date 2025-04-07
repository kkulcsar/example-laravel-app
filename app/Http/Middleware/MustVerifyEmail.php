<?php

namespace App\Http\Middleware;

use App\Exceptions\UserNotVerifiedException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws UserNotVerifiedException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->email_verified_at === null) {
            throw new UserNotVerifiedException("Your account is not verified.", Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
