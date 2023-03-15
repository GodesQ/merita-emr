<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Physicians
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
        $data = session()->all();
        if ($data['dept_id'] == 7 || $data['dept_id'] == 1 || $data['dept_id'] == 8 || $data['dept_id'] == 6) {
            return $next($request);
        }
        return redirect('/dashboard')->with(
            'fail',
            'You cannot access this section'
        );
        return $next($request);
    }
}