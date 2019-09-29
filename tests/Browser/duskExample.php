<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

// test készítés: php artisan dusk:make admin/LoginTest
class dusExample extends DuskTestCase
{  
 use DatabaseMigrations;

    protected $user;

    public function setUp() //test előtti beállítások

    {
        parent::setUp();
        $this->user = factory('App\User')->create();
        $this->artisan('db:seed');
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
   public function webes() //távoli gépen is használható

    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://doc.mottoweb.hu/login');
// get the value...
            $value = $browser->value('selector'); // input mezők értéke
            $text = $browser->text('selector'); //pl div vagy span vgy link szövege
// Set the value...
            $browser->value('selector', 'value')
                ->type('firstname', 'John') //a firstname nevű input mezőbe beírja aJohn nevet
                ->keys('input[placeholder="Email"]', 'your.email@gmail.com')
                ->attach('photo', __DIR__ . '/photos/me.png') //file feltöltés
                ->clear('email') //törli az email mező tartalmát
                ->select('state') //véletelenszerűen kiválasztaja a state select egyik mezőjét
                ->select('state', 'NC') //Az NC mező kiválsztása
                ->check('terms') // checkboxok bejelölése
                ->check('terms2')
                ->uncheck('terms')
                ->radio('gender', 'Male') //radiobutton
                ->chooseRandomRadio('radioElementName')
                ->pause(2000)
                ->clickLink('Logout') //kattintás Logout linkre
                ->click('@login-button') // kattintás dusk selectoron pl: <button dusk="login-button">Login</button>
                ->press('Sign Up') //kattintás a Sign up gombra gombra
                ->press('button[type="submit"')
                ->assertPresent('#csomag1')
                ->assertPresent('<!--view:index-->') //nem biztos hogy mükszik ki kell probálni
                ->assertVisible('.my-class-element')
                ->screenshot('image_name') //képernyő képet készít image_name.png névvel
                ->assertSee('Login');
        });
    }

    public function localhost() //artisan futtatási lehetőséggel

    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000/')
                ->logout()
                ->assertGuest()
                ->loginAs(User::find(1)) //vagy  ->loginAs( $this->user)
                ->visit('/home')
                ->assertSee('Dashboard')
                ->assertAuthenticated()
                ->assertAuthenticatedAs(User::find(1));
        });
    }
    
}
