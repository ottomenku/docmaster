<?php
namespace App\Traits;
use App\Pay;
use App\Billingdata;

trait BarionHandler
{

    public  function saveBillingDataGetBilling($request)
    {
        
         $billing = Billingdata::firstOrCreate($request->only(['user_id', 'fullname', 'cardname', 'city', 'zip', 'address', 'tel', 'adosz']));
         return $billing;
    }

   public  function prepareBarion($billingdata,$order_id)
   {
  
        $order=$this->ordersData[$order_id];
        $user = \Auth::user() ;
       return \Barion::paymentStart([
               'PaymentType' => 'IMMEDIATE',
               'GuestCheckOut' => true,
               'FundingSources' => ['ALL'],
               'Locale' => 'hu-HU',
               'Currency' => 'HUF',
               'PayerHint' => $user->email,
               'ShippingAddress' => [
                   'Country' => "HU",
                   'City' =>$billingdata->city,
                   'Zip' => $billingdata->zip,
                   'Street' => $billingdata->address ,
                   'Street2' => "",
                   'FullName' => $billingdata->cardname,
                  // 'Phone' => "43259123456789",
               ],
               'RedirectUrl' => "https://doc.mottoweb.hu/barionredirect",
               'CallbackUrl' => "https://doc.mottoweb.hu/barioncallback",
               'Transactions' => [
                   [
                       'POSTransactionId' => $billingdata->id .'-'.rand(100,10000),
                       'Payee' => $this->barionResEmail,
                       'Total' => $order['total'],
                       'Items' => [
                           [
                               'Name' =>  $order['name'],
                               'Description' => $order['descripton'],
                               'Quantity' => 1,
                               'Unit' => 'db',
                               'UnitPrice' => $order['total'],
                               'ItemTotal' => $order['total'],
                           ],
                       ],
                   ],
               ],
           ]);
   }

 //  ['user_id','fullname','cardname','city','zip','address','tel','adosz'];
 /*   public  function getBillingData($request)
    {
   
        $data['fullname']=$request->fullname;
        $data['cardname']=$request->cardname;   
        $data['city']=$request->city;
        $data['zip']=$request->zip;
        $data['address']=$request->address;
        $data['tel']=$request->tel;
        $data['adosz']=$request->adosz;
      
        $data['email']=$user->email; 
        return $data;
    }
    /**
     * retrn billing_id
     */
 /*   public  function saveBillingDataGetBillingId($request,$data)
    {
        
        $billing= Billingdata::where([
            ['user_id', '=', $data['user_id']],
            ['fullname', '=', $data['fullname']],
            ['cardname', '=', $data['cardname'] ],
            ['city', '=',$data['city'] ],
            ['zip', '=', $data['zip']],
            ['address', '=', $data['address'] ],
            ['tel', '=', $data['tel']],
            ['adosz', '=', $data['adosz']]
        ])->first();
        $b_id=$billing->id ?? 0;
        if($b_id<1){$b_id=Billingdata::insertGetId($data);}
        return $b_id;

    }
    public  function prepareBarion($data,$cost)
    {
        return \Barion::paymentStart([
                'PaymentType' => 'IMMEDIATE',
                'GuestCheckOut' => true,
                'FundingSources' => ['ALL'],
                'Locale' => 'hu-HU',
                'Currency' => 'HUF',
                'PayerHint' => $this->barionResEmail,
                'ShippingAddress' => [
                    'Country' => "HU",
                    'City' => $data['city'],
                    'Zip' => $data['zip'],
                    'Street' => $data['address'],
                    'Street2' => "",
                    'FullName' => $data['cardname']
                   // 'Phone' => "43259123456789",
                ],
                'RedirectUrl' => "https://doc.mottoweb.hu/barionredirect",
                'CallbackUrl' => "https://doc.mottoweb.hu/barioncallback",
                'Transactions' => [
                    [
                        'POSTransactionId' => 'ABC-' ,
                        'Payee' => $data['email'],
                        'Total' => $cost['total'],
                        'Items' => [
                            [
                                'Name' =>  $cost['name'],
                                'Description' => $cost['description'],
                                'Quantity' => 1,
                                'Unit' => 'db',
                                'UnitPrice' => $cost['total'],
                                'ItemTotal' => $cost['total'],
                            ],
                        ],
                    ],
                ],
            ]);
    }*/
}