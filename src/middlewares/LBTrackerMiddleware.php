<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LBT_request;

class LBTrackerMiddleware
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
        LBT_request::save_request($request);
        return $next($request);
    }
}
