<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;

class BarionTraitHandler
{
    use \App\Traits\BarionHandler;
    public $ordersData = ['min' => ['total' => 400, 'days' => 30]];
}

class BarionHandlerTest extends TestCase
{
    public $ordersData = ['min' => ['total' => 400, 'days' => 30]];
    public function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite_testing']);
        \Artisan::call('migrate');
    }


    public function testCreatePay() //Transactions[[Items[[Name]],[items2]],  Errors, PaymentId
    {
        $br = new BarionTraitHandler();
        $pay= $br->createBarionPay(111,11,'min');
        $payid=$pay->id ?? 0;
        $this->assertTrue($payid > 0);

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

    public function testSetRoletime()
    {
// $pay = $this->createMock(Pay::class);
        $pay = \Mockery::mock('Pay');
        $pay->order_id = 'min';
        $pay->payment_id = 5;
        $pay->user_id = 3;
        $pay->id = 10;
//   config(['database.default' => 'sqlite_testing']);
        //  \Artisan::call('migrate');
        $br = new BarionTraitHandler();
        $roletime = $br->setRoletime($pay);
// $roletime = $this->setRoletime($pay);
        $this->assertTrue($pay->id > 0);
        $this->assertEquals($roletime->user_id, 3);

        $end = Carbon::createFromFormat('Y-m-d', $roletime->end);
        $start = Carbon::createFromFormat('Y-m-d', $roletime->start);
        $days = $end->diffInDays($start);
        $this->assertEquals($days, 30);

        $this->assertEquals($roletime->pay_id, 10);
        $this->assertEquals($roletime->role_id, 3);

    }

    public function testSaveBillingDataGetBilling()
    {
//$this->memoryDB();
        config(['database.default' => 'sqlite_testing']);
        \Artisan::call('migrate');
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

}
