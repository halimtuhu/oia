<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class VisitorMiddleware
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
        if(!Sentinel::check())
          return $next($request);
        else{
          switch (Sentinel::getUser()->roles()->first()->slug) {
            case 'admin':
              return redirect('/admin');
              break;
            case 'user':
              return redirect('/');
              break;

            default:
              return redirect('/login');
              break;
          }
        }
    }
}
