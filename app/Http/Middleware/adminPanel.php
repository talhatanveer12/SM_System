<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminPanel
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
        if(Auth::check()){
            if(Auth::user()->type == 'admin'){
                return redirect()->route('adminDashboard');
            }
            elseif (Auth::user()->type == 'student') {
                return redirect()->route('studentDashboard');
            }
            else{
                return redirect()->route('teacherDashboard');
            }
            //return redirect()->route('login');
        }
        return $next($request);
    }
}
