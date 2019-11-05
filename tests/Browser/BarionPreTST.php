<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BarionTest extends DuskTestCase
{
   
  /*
    public function testBarioncallback()
    {
      $this->browse(function (Browser $browser) {

        $browser->visit(config('app.duskDomain').'/test/barioncallback?paymentId=32ba2d668de54da285ec6fb376f1956c')
            ->screenshot('barion-callback')
            ->assertSee('Nincs hiba')
            ->assertSee('status : Expired');
    });
    }
  
  /**
     *komplett store test
     * @return void
     */
  public function testStore()
    {
      $this->browse(function (Browser $browser) {
            $browser->visit(config('app.duskDomain').'/test/storetest')
                ->screenshot('barion-page')
                ->assertSee('Nincs hiba')
                ->assertSee('gateway')
                ->assertSee('billingdata_id')
                ->assertSee('barion_id');
        });
    }
  
    public function testPreparebarion()
    {
      $this->browse(function (Browser $browser) {
            $browser->visit(config('app.duskDomain').'/test/barionprepare')
                ->screenshot('praparebarion-page')
                ->assertSee('Nincs hiba')
                ->assertSee('gateway');
        });
    }
  
}
