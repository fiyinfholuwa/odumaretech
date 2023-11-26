<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Providers\RouteServiceProvider;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->user_type ='2') {
            return redirect(RouteServiceProvider::HOME);
        }elseif($request->user() && $request->user()->user_type ='1'){
            return redirect(RouteServiceProvider::HOME);
        }elseif($request->user() && $request->user()->user_type ='0'){
            return redirect(RouteServiceProvider::HOME);
        }else{
            return redirect()->route('home');
        }
    
        return $next($request);
    }
}
