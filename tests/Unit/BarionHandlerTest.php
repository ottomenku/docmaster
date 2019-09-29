<?php

namespace Tests\Unit;

use Carbon\Carbon;
use App\Barion;
use App\Pay;
use App\Bariontransaction;
use App\Roletime;
use Tests\TestCase;

class BarionTraitHandler
{
    use \App\Traits\BarionHandler;

    public $ordersData = ['min' => ['total' => 400, 'days' => 30]];
    public $userid =1;
    
}
/*
 *  $this->saveBillingDataGetBilling($request);
 * $this->prepareBarion($billingData, $order_id); // nincs teszt
 * createBariontransaction($res['billingdata_id'],$order_id);
 *createBarion($BC,$res['bariontransaction_id'],'store');
 */
class BarionHandlerTest extends TestCase
{   
    public $userid =1;
    public $ordersData = ['min' => ['total' => 400, 'days' => 30]];
    //  ha kikommentelem a tesztetket legyen egy jó teszt hogy a phpunit ne jelezzen hibát   
  //  public function testTrue() {$this->assertTrue(true);}
    public function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite_testing']);
        \Artisan::call('migrate');
    }
     public function createPayRoletime($pay)
    {
        $roletime = Roletime::where('pay_id', $pay->id)->first();
       
        if ($roletime->id == null) {
            $roletime = $this->setRoletime($pay);
        }
        return  $roletime;              
    }
   public function testcreatePayRoletime() 
    { //['user_id','admin_id','action_id','billingdata_id','order_id','type','total','days','note'];
        $pay=Pay::create( ['user_id'=>1,'admin_id'=>1,'action_id'=>1,'billingdata_id'=>1,'order_id'=>'min','type'=>'min','total'=>1,'days'=>1,'note']);
        $br = new BarionTraitHandler();
        $PayRoletime= $br->createPayRoletime($pay) ;
      // $BarionPay= $this->createBariontransaction(111,'min');
      $payid= $PayRoletime->id ?? 0;
      $this->assertTrue($payid > 0);
      $PayRoletime=$br->createPayRoletime($pay);
      $this->assertEquals($PayRoletime->id ,$payid);
      $pay=Pay::create( ['user_id'=>1,'admin_id'=>1,'action_id'=>2,'billingdata_id'=>2,'order_id'=>'min','type'=>'min','total'=>1,'days'=>1,'note']);
      $PayRoletime= $br->createPayRoletime($pay);
      $this->assertNotEquals($PayRoletime->id ,$payid);
    }
 /*   
    public function testCreateBariontransaction() 
    {
        $br = new BarionTraitHandler();
        $BarionPay= $br->createBariontransaction(111,'min') ;
      // $BarionPay= $this->createBariontransaction(111,'min');
        $BarionPayid=$BarionPay->id ?? 0;
        $this->assertTrue($BarionPayid > 0);
        $this->assertEquals($BarionPay->total,400);
        $this->assertEquals($BarionPay->days,30);
    }
    

      public function testCreatePay() //Transactions[[Items[[Name]],[items2]],  Errors, PaymentId
    {
        $br = new BarionTraitHandler();
        $pay= $br->createBarionPay(111,11,'min');
        $payid=$pay->id ?? 0;
        $this->assertTrue($payid > 0);

    } 

    public function testcreateTransactionPay() //Transactions[[Items[[Name]],[items2]],  Errors, PaymentId
    {
        $br = new BarionTraitHandler();  //['time','user_id','billingdata_id','order_id','total','days']
        $barionTransaction=Bariontransaction::create(['time'=>'22228787','billingdata_id'=>1,'order_id'=>'min','total'=>100,'days'=>10]);
        $pay= $br->createTransactionPay($barionTransaction->id);
        $payid=$pay->id ?? 0;
        $this->assertTrue($payid > 0);
        $pay= $br->createTransactionPay($barionTransaction->id);
        $this->assertEquals($pay->id ,$payid);
         $barionTransaction=Bariontransaction::create(['time'=>'22228787','billingdata_id'=>2,'order_id'=>'min','total'=>10,'days'=>10]);
        $pay= $br->createTransactionPay($barionTransaction->id);
        $this->assertNotEquals($pay->id ,$payid);
    }
    
    public function testCreateBarion() //Transactions[[Items[[Name]],[items2]],  Errors, PaymentId
    {
        $data['PaymentId'] = 12;
        $data['Errors'][] = ['hiba' => 'valami roszz'];

        (object) $items = [(object) ['Name' => 'base'], []];
        $data['Transactions'][] = (object) ['Items' => $items];
        $data['Total'] = 800;
        $data['Status'] = 'Succeeded';
        // $jsonpaymentState = json_encode($data,JSON_FORCE_OBJECT);
        $jsonpaymentState = (object) $data;
        $br = new BarionTraitHandler();
       
        $barion = $br->createBarion($jsonpaymentState, 11, 'callback');
        $barionid = $barion->id ?? 0;
        $this->assertTrue($barionid > 0);

    }
    public function setRoletime($pay)
    {
        
        $start=RoleTime::getRoleStart($pay->user_id,3);

        $order = $this->ordersData[$pay->order_id];
        $days = $order['days'];
        $payid = $pay->id ?? 0;
        if ($payid > 0) {
            $rData['user_id'] = $pay->user_id;
            $rData['admin_id'] = 1;
            $rData['role_id'] = 3;
            $rData['pay_id'] = $payid;
            $rData['start'] = $start;
            $rData['end'] =Carbon::createFromFormat('Y-m-d', $start)->addDay($days)->format('Y-m-d');
            // Carbon::now()->addDay($days)->format('Y-m-d');
            return RoleTime::create($rData);
        }
    }
    public function testSetRoletime()
    {
// $pay = $this->createMock(Pay::class);
        $pay = \Mockery::mock('Pay');
        $pay->order_id = 'min';
        $pay->total = 400;
        $pay->days = 30;
        $pay->payment_id = 5;
        $pay->user_id = 3;
        $pay->id = 10;

        //$br = new BarionTraitHandler();
      //  $roletime = $br->setRoletime($pay);
        $roletime = $this->setRoletime($pay);
        $this->assertTrue($pay->id > 0);
        $this->assertEquals($roletime->user_id, 3);

        $end = Carbon::createFromFormat('Y-m-d', $roletime->end);
        $start = Carbon::createFromFormat('Y-m-d', $roletime->start);
        $days = $end->diffInDays($start);
        $this->assertEquals($days, 30);
        $this->assertEquals($roletime->start, Carbon::now()->format('Y-m-d'));
        $this->assertEquals($roletime->pay_id, 10);
        $this->assertEquals($roletime->role_id, 3);

        $roletime = $this->setRoletime($pay);
        $this->assertEquals($roletime->start, Carbon::now()->addDay($days)->format('Y-m-d'));
    }
  
    public function testSaveBillingDataGetBilling()
    {

        $br = new BarionTraitHandler();
        $request = \Request::create('/pay', 'POST', [
            'user_id' => 11,
            'fullname' => 'Ménkű Ottó',
            'cardname' => 'Ménkű Ottó',
            'city' => 'Jászberény',
            'zip' => 5100,
            'address' => 'Liliom u.1',
            'tel' => '70/5588301',
            'adosz' => '564646465456',

        ]);
        $billingdata = $br->saveBillingDataGetBilling($request);
        $this->assertTrue($billingdata->id > 0);

    }
    */
}
