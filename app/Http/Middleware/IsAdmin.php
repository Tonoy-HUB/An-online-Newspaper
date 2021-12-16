<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;


class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->role_id==1){
                return $next($request);
            }else{
                return redirect()->back()->with('error', 'You are not admin');
            }

        }else{
            return redirect()->route('login')->with('error', 'You are not authenticated user');
        }
    }
}
