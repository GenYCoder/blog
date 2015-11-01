<?php

namespace App\Http\Middleware;

use Closure;

class Demo
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
        //will only show this if they are in this route and has para foo but will go to the next request
        if( $request->is('articles/create') && $request->has('foo') )
        {
            echo "hello world";
        }

        return $next($request);
    }
}
