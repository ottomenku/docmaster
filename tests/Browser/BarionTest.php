<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BarionTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
          //  $browser->visit('http://localhost:8000/')
          $browser->visit('http://doc.mottoweb.hu/login')
                //->assertPresent('#csomag1');
                  //  ->screenshot('home-page')
                   ->assertSee('Login');
                   //->assertPresent('<!--view:index-->');
        });
    }
}
