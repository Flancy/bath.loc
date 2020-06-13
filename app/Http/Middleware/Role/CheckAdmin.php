<?php

namespace App\Http\Middleware\Role;

use Closure;

class CheckAdmin
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
        if($request->user()->role !== 'admin') {
            return redirect()->back();
        }

        return $next($request);
    }
}
