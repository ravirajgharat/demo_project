<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
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
        if ($request->user() && ($request->user()->roles->contains('id',1) || $request->user()->roles->contains('id',2) || $request->user()->roles->contains('id',3) || $request->user()->roles->contains('id',4))) {
            return redirect('/admin');
        } 
        if ($request->user() && ($request->user()->roles->contains('id',5))) {
            return redirect('/cust/shop');
        }
        return $next($request);
    }
}
