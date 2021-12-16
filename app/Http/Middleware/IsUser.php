<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;


class IsUser
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
            if(Auth::user()->role_id == 2){
                return $next($request);
            }else{
                return redirect()->back()->with('error', 'You are not a User');
            }
        }
        else{
            return redirect()->route('login')->with('error', 'You are not logged in');
        }
    }
}

