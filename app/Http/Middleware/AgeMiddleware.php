<?php

namespace App\Http\Middleware;

use Closure;

class AgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $age)
    {
        $age = $request->route('age');
        if ($age < 18) {
            return abort(403);
        }

        return $next($request);
    }
}
