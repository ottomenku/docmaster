<?php

namespace App\Http\Middleware;

use Closure;

class TestSetup
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
      config(['database.default' => 'mysqltest']);
    //  \App::setLocale('ts'); 
    //  config(['app.locale' => 'ts']);
      return $next($request);

      }
}
