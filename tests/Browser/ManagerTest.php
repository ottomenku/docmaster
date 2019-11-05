<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

// test készítés: php artisan dusk:make admin/LoginTest
class ManagerTest extends DuskTestCase
{
    //use \DatabaseMigrations;
    protected $screenshot = true;
    protected $user;
    protected $baseurl = 'http://test.localhost:8000';
    public function setUp(): void//test előtti beállítások
    {
        parent::setUp();
        // $this->baseurl=config('motest.dusk.baseurl');

        // $this->user = factory('App\User')->create();
        // $this->artisan('db:seed');
    }

    //TODO:megcsinálni ahibás teszteket
    /**
     * Jó CRUD működést tesztelő prog
     *
     * @return void
     */
    protected function runTstfunc($param, $action,$crudname, $browser)
    {
        if (!is_array($param)) {$param = explode(',', $param);}
        foreach ($param as $par) {
          $par = str_replace("{crudname}", $crudname, $par);
            $pars = explode(':', $par);
            if (isset($pars[1])) {$browser->$action($pars[0], $pars[1]);} else {
                $browser->$action($pars[0]);
            }
        }
        return $browser;
    }

    public function testCrud() //távoli gépen is használható
    {

    $this->browse(function (Browser $browser) {
        $browser->visit($this->baseurl . '/testlogin')
            ->type('email', 'manager@dolgozo.com')
            ->type('password', 'aaaaaa')
            ->press('Login')
            ->visit($this->baseurl . '/truncate')
            ->waitFor('@truncated', 10);
        // ->screenshot('testlogin');

        foreach (config('motest.dusk.managercruds') as $crudname => $tasks) {
            
            foreach ($tasks as $taskname => $actions) {
              $actions= array_merge(config('motest.dusk.basecruds.'.$taskname ), $actions);
                $off = $actions['off'] ?? false;
                if (!$off) {
                    //  $tasks = array_merge(config('motest.dusk.managercruds'), $tasks);
                    foreach ($actions as $action => $param) {

                        if ($action == 'visit') {
                          $param = str_replace("{crudname}", $crudname, $param);
                          $browser->visit($this->baseurl . $param);
                        } 
                        elseif ($action == 'form') {
                            foreach ($param as $action1 => $par1) {
                                $browser = $this->runTstfunc($par1, $action1,$crudname, $browser);
                            }
                        } else {
                            $browser = $this->runTstfunc($param, $action,$crudname, $browser);
                        }
                    }
                    if ($this->screenshot) {$browser->screenshot($crudname . '_' . $taskname);}
                }

            }

        }
    });
}

/*
->assertSee($text);->assertDontSee($text);
->assertHostIs($host);
->assertPathIs('/home');
->assertTitle($title);->assertTitleContains($title);
->assertSourceHas($code);->assertSourceMissing($code);
->assertSeeLink($linkText);->assertDontSeeLink($linkText);
//action-------------
press('button[type="submit"')

//two params:
->assertRouteIs($name, $parameters);-
->assertSeeIn($selector, $text);->assertDontSeeIn($selector, $text);
->assertSelected($field, $value); ->assertNotSelected($field, $value);
//action-------------
->type('firstname', 'John')
->attach('photo', __DIR__ . '/photos/me.png') //file feltöltés
->select('state', 'NC') //Az NC mező kiválsztása
->radio('gender', 'Male') //radiobutton
->keys('input[placeholder="Email"]', 'your.email@gmail.com')
 */

    //  $browser->visit('http://doc.mottoweb.hu/login');
    // get the value...
    //    $value = $browser->value('selector'); // input mezők értéke
    //   $text = $browser->text('selector'); //pl div vagy span vgy link szövege
    // Set the value...
    /*$response = $this->call('POST',$this->baseurl.'/logout', ['_token' => csrf_token()]);
    //         $browser->visit('http://localhost:8000')
    $browser->visit($this->baseurl)
    //  ->screenshot('image_name')
    // ->assertPresent('@login-link')
    ->assertVisible('@registration-link')
    ->assertVisible('@login-link')
    //  ->assertVisible('@logout-link')
    ->click('@login-link')
    ->type('email', 'menkuotto@gmail.com')
    ->type('password', 'aaaaaa')
    //->assertPresent('@registration-link')
    ->press('button[type="submit"')
    ->screenshot('image_name')
    ;
    /*  //   ->type('firstname', 'John') //a firstname nevű input mezőbe beírja aJohn nevet
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
    ->assertSee('Login');*/

    /*  public function localhost() //artisan futtatási lehetőséggel

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
}*/
}
