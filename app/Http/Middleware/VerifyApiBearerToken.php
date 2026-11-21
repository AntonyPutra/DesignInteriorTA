<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyApiBearerToken
{
    /**
     * Handle an incoming request.
     * Validates Bearer token using timing-safe comparison (hash_equals).
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $expectedToken = (string) config(
            'services.ninerouter.app_bearer_token',
            config('services.ai.app_bearer_token', env('APP_API_BEARER_TOKEN', 'pratama_secret_token_2026'))
        );

        // Disallow access if expected token is not configured
        if (empty($expectedToken)) {
            return response()->json([
                'status'  => false,
                'message' => 'Unauthorized: API Bearer Token is not configured on the server.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $authHeader = $request->header('Authorization', '');
        $token = '';

        if (str_starts_with($authHeader, 'Bearer ')) {
            $token = trim(substr($authHeader, 7));
        } elseif ($request->has('api_token')) {
            $token = trim((string) $request->input('api_token'));
        }

        if (empty($token) || !hash_equals($expectedToken, $token)) {
            return response()->json([
                'status'  => false,
                'message' => 'Unauthorized: Invalid or missing API Bearer Token.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
