<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
// use Firebase\JWT\JWT;
use Closure;

class jwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken('token');
        if (!$token) {
            log::error("Token error");
            return response()->json([
                "status" => "error",
                "message" => "token not found!",
                "result" => []
            ], 401);
        }
        return $next($request);
    }
}
