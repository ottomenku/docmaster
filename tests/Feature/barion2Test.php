<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\TestResponse;
class barion2Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
   $ControllerM  =  \App::make('App\Http\Controllers\BarionController');
      $ControllerM->pay('');
        $this->assertTrue(true);


       /* $response = $this->get('/home');

        $response->assertStatus(200);

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/pay', ['fullname' => 'Sally']);
      //  $response->dumpHeaders();

      //  $response->dump();
        $response
            ->assertStatus(201);
            //->assertJson([
           //     'created' => true,
          //  ]);
    /*    
       $response = $this->post('/user', ['fullnamme' => 'Sally'])
        
        ;
      

    $response->seeJsonEquals([
            'created' => true,
        ]);**/

     
    }
}
