<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidAdmin
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
        if(session('role')){
            if (session('role') == 'customer') {
                return $next($request);
            } else{
                return redirect()->route('/login')->with("warning", "login as Admin!");
            }
        }else{
            return redirect()->route('/login')->with("warning", "login first!");
        }
    }
}
