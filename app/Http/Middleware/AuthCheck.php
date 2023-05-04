<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if(!session()->has(['classification'])) {
            return redirect('/login')->with('fail', 'You must be logged in');
        }

        if(session()->has('classification') && ($request->path == '/' || $request->path() == '/register')) {
            return redirect('/login')->with('fail', 'You must be logged in');
        }
        return $next($request);
    }
}
