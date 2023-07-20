<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\ApiException;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\AuthService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        try {
            $service = new AuthService();
            $token = $request->bearerToken();
            $service->lifeToken();
            $user = $service->check($token);

            if ($user) {
                return $next($request);
            }

            throw new ApiException('Invalid token', 0, 401);
        } catch (ApiException $e) {
            return error($e);
        }
    }
}
