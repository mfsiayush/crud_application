<?php

namespace App\Http\Middleware;

use Closure;

class CheckUrl
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
        if($request->id!=123 && $request->id!=789){
            return response(view('unauth'));
        }
        return $next($request);
    }
}
