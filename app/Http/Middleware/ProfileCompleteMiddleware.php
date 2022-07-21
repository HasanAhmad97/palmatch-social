<?php

namespace App\Http\Middleware;

use Closure;

class ProfileCompleteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->is_complete)
            return response()->json(['error' =>'not_complete_profile'], 226);
        return $next($request);
    }
}
