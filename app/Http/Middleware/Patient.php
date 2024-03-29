<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Patient
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
        if ($data['dept_id'] == 1 || $data['dept_id'] == 17 || $data['dept_id'] == 8 || $data['dept_id'] == 5 || $data['dept_id'] == 2) {
            return $next($request);
        }
        return redirect('/dashboard')->with(
            'fail',
            'You cannot access this section'
        );
    }
}