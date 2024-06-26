<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StationeryOperatorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role_as =='5'){
                return $next($request);
            }else{
                return redirect('/home')->with('status','Acess Denied! You are not a stationery operator');
            }
        }else{
            return redirect('/home')->with('status','Please login first!');
        }
    }
}
