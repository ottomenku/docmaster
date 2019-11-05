<?php
namespace App\Http\Middleware;

use Closure;
use App;

class Localization
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
     /* if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }*/
if (\Str::contains(\Request::root(), '://test.')) {
      App::setLocale('ts');
    //config(['app.locale' => 'ts']);
}
else{
    App::setLocale('hu');

}
//config(['app.locale' => 'ts']);    
     //   App::setLocale('hu');
    //session()->put('locale','hu');  
        return $next($request);
    }
}