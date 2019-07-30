<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Constraint\IsFalse;
use App\RoleTime;
use Carbon\Carbon;
class HasroletimeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   public function testHasRoleTime()
    {
        //$this->memoryDB();
        config(['database.default' => 'sqlite_testing']);
        \Artisan::call('migrate');
        $roletime=new Roletime();
        $this->assertFalse($roletime->hasRole(1,1));
        
     //   $today=\Carbon\Carbon::now()->format('Y-m-d') ;
        $today=Carbon::now();
        $tomorrow=Carbon::now()->addDay(1);
        $tomorrow2=Carbon::now()->addDay(2);
        $yesterday=Carbon::now()->addDay(-1);
        $yesterday2=Carbon::now()->addDay(-2);
        RoleTime::create([
            'user_id' => 1,
            'role_id'  => 1,
            'admin_id' => 1,
            'start' => $tomorrow,
            'end' => $tomorrow2,
        ])->id;
        RoleTime::create([
            'user_id' => 1,
            'role_id'  => 1,
            'admin_id' => 1,
            'start' => $yesterday2,
            'end' => $yesterday,
        ]);
        RoleTime::create([
            'user_id' => 2,
            'role_id'  => 1,
            'admin_id' => 1,
            'start' => $today,
            'end' => $tomorrow,
        ]);
        RoleTime::create([
            'user_id' => 1,
            'role_id'  => 2,
            'admin_id' => 1,
            'start' => $today,
            'end' => $tomorrow,
        ]);
     //   $this->assertEquals($id,1); 
     //  $this->assertTrue(true);
    
     $this->assertFalse($roletime->hasRole(1,1));
     $id = RoleTime::create([
        'user_id' => 1,
        'role_id'  => 1,
        'admin_id' => 1,
        'start' => $yesterday,
        'end' => $today,
    ])->id;
    
    $this->assertTrue($roletime->hasRole(1,1));
    $roletime->destroy($id);
    $this->assertFalse($roletime->hasRole(1,1));
    $id = RoleTime::create([
        'user_id' => 1,
        'role_id'  => 1,
        'admin_id' => 1,
        'start' => $today,
        'end' => $tomorrow,
    ])->id;
    $this->assertTrue($roletime->hasRole(1,1));
    $roletime->destroy($id);
    RoleTime::create([
        'user_id' => 1,
        'role_id'  => 1,
        'admin_id' => 1,
        'start' => $yesterday,
        'end' => $tomorrow,
    ]);
    $this->assertTrue($roletime->hasRole(1,1));
    RoleTime::create([
        'user_id' => 1,
        'role_id'  => 1,
        'admin_id' => 1,
        'start' => $today,
        'end' => $tomorrow,
    ]);
    $this->assertTrue($roletime->hasRole(1,1));
    }
    public function memoryDB()
    {
        config(['database.default' => 'sqlite_testing']);
        \Artisan::call('migrate');

           \Artisan::call('db:seed'); 
    }
}
