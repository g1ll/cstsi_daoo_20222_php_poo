<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AppApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $api_key = $request->bearerToken();
        // dd($api_key);
        if(!$api_key)
            $api_key = $request->api_key;
        if ($api_key != env('API_KEY')) {
            return response()->json('Unauthorized', 401);
        }
        return $next($request);
    }
}
