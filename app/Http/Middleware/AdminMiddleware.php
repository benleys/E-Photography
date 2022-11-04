<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::check()) {
            if(Auth::user()->user_type == '1') {
                return $next($request);
            } else {
                return redirect('/')->with('badstatus', 'Access Denied! You are not an admin');
            }
        } else {
            return redirect('/')->with('badstatus', 'Please login first');
        }
    } //Source: fundaofwebit.com
}
