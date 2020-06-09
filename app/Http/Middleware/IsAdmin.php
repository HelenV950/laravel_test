<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd(auth()->user()->role->id);
         //dd($request);
        
        if(auth()->user()->IsAdmin){
            return $next($request);
        }
        
        return redirect('/')->with(['customError' => 'This page only for admin']);
       
    }
}
