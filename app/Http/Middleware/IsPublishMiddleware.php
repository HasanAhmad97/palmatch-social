<?php

namespace App\Http\Middleware;

use Closure;

class IsPublishMiddleware
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
        if (!auth()->user()->is_publish)
            return response()->json(['error' =>'is_not_publish'], 225);
        return $next($request);
    }
}
