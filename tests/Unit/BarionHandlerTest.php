<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Constraint\IsFalse;
use App\RoleTime;
use Carbon\Carbon;
use App\Pay;
use App\Billingdata;
class BarionTraitHandler
{
use \App\Traits\BarionHandler;
}

class BarionHandlerTest extends TestCase
{
 //   public  function saveBillingDataGetBilling($request)
        
   public function testSaveBillingDataGetBilling()
    {
        //$this->memoryDB();
        config(['database.default' => 'sqlite_testing']);
        \Artisan::call('migrate');
        $br=new BarionTraitHandler();
        $request = \Request::create('/pay', 'POST',[
            'user_id' => 11,
            'fullname'  => 'Ménkű Ottó',
            'cardname'  => 'Ménkű Ottó',
            'city'  => 'Jászberény',
            'zip'  => 5100,
            'address'  => 'Liliom u.1',
            'tel'  => '70/5588301',
            'adosz'  => '564646465456',

        ]);
$billingdata= $br->saveBillingDataGetBilling($request);
 $this->assertTrue($billingdata->id>0);

//$BC = $this->prepareBarion($billingdata, $request->order_id);
//$paymentid = $BC->PaymentId;
//$error = $BC->Errors;
//$gateway = $BC->GatewayUrl;
       //  $request->request->add(['user_id' => 11]); 
     //   $this->assertTrue($roletime->hasRole(1,1));

       
    }

}
