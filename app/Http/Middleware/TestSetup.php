<?php

namespace App\Http\Middleware;
use App\User;
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
         
        config(['database.default' => 'sqlite_testing']);
        \Artisan::call('migrate');
        $user = User::create(['name' => 'test','email' => 'test@test.hu', 'password' => password_hash('123456', 1)]);
    //echo'fffffffffffffffffffffffffffffff'
    }
}
