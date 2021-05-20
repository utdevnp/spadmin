<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
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

        $segment = $request->segment(1);
        
       if(! checkRoute($segment)){
         return redirect()->route("dashboard")->with("danger","Access Denied to ".$segment." !! Please contact with administrator");
       }

        return $next($request);
    }
}
