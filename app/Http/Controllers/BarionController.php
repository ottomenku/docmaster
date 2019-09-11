<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\RoleTime;
use App\Pay;
use App\Category;
use App\Billingdata;
use Carbon\Carbon;
use Illuminate\Http\Request;

require_once '../library/BarionClient.php';

class BarionController extends Controller
{
    use \App\Traits\BarionHandler;

    public $barionResEmail = 'motto001@gmail.com'; //ide küld a barion értesítést. BarioHandler->prepareBarion();
    public $ordersData = [ //csomag dijak adatok
        1 => ['name' => 'havi', 'descripton' => 'one month', 'total' => 400, 'days' => 30],
        2 => ['name' => 'félév', 'descripton' => 'six month', 'total' => 800, 'days' => 190],
        3 => ['name' => 'év', 'descripton' => 'one year', 'total' => 1000, 'days' => 370],
    ];

    public function messagetest()
    {
        return redirect('/')->with('flash_message', 'Teszt üzenet');
    }
    public function errortest(Request $request)
    {
        $data['categories']=Category::all();
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:200',
        ]);
      return  view('cristal.index', compact('data'))->withErrors($validator);
    }


    public function billingdata($order_id)
    {
        $user = \Auth::user();
        $userid = $user->id ?? 0;
        if ($userid < 1) {
            return view('cristal.needlogin');
        } else {
            $data['order_id'] = $order_id;
            return view('cristal.billingdata', compact('data'));
        }
    }
    public function billingdataJson($order_id)
    {
       $data['order_id'] = $order_id;
        return response()->json(['html' => view('cristal.billingdata', compact('data'))->render()]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function pay(Request $request)
    {  
        $data = [];
        $user = \Auth::user();

        $validator = \Validator::make($request->all(), [
            //'email' => 'required|email|unique:users',
            'fullname' => 'required|string|max:200',
            'cardname' => 'required|string|max:200',
        ]);

        if ($validator->fails()) {return response()->json(['html' => view('cristal.billingdata', compact('data'))->withErrors($validator)->render()]);}

        $request->request->add(['user_id' => \Auth::user()->id]);
        $billingData = Billingdata::firstOrCreate($request->all());
        $BC = prepareBarion($billingData, $request->order_id);
        $paymentid = $BC->PaymentId;
        $error = $BC->Errors;
        $gateway = $BC->GatewayUrl;

        //paydata--------  
                $data['user_id'] = $user->id ;
                $data['admin_id'] = 1;  //1: root a gépi bevitelek pl barion ezt használják egyébként user_id
                $data['payment_id'] = $paymentid  ;
                $data['billingdata_id'] =$billingData->id ;
                $data['order_id'] =$request->order_id ;  // csomag azonosító 1-3
               // $data['nyugtaszam'] = ;  // ha számlát állítottak ki
                $data['type'] = 'barion' ; 
                $data['total'] =$this->ordersData[$request->order_id]['total'];
                $data['note'] = '' ; 

        if (empty($error)) {
                 // a barion ide menti a komplett json választ
                $data['status'] ='prepared' ;
            Pay::create($data);
            return redirect($gateway);
        } else {
            $data['status'] ='hiba_prepared:'. $error ;
            Pay::create($data);
           return redirect('/')->with('flash_message', 'Hiba történ a Barion fizetés közben. A barion server válasza:'.$error);
        }
    }

    public function redirect(Request $request)
    {

        $paymentId = $request->get("paymentId");
       $paymentState = \Barion::getPaymentState($paymentId);
       $status = $paymentState->Status; //sikeres:Succeeded   https://doksi.barion.com/PaymentStatus
        $errors = $paymentState->Errors;
        if (empty($errors)) {
      return redirect('/')->with('flash_message', 'Barion fizetés sikeres volt. Letöltési jog beállítva');
   } else {
      
      return redirect('/')->with('flash_message', 'Hiba történ a Barion fizetés közben. A barion server válasza:'.$errors);
   }


    }

    public function callback(Request $request)
    {
        //   $paymentid=$request->get("paymentId") ?? $_GET['paymentId'] ;
        $paymentId = $request->get("paymentId");
      
            $paymentState = \Barion::getPaymentState($paymentId);
            $status = $paymentState->Status; //sikeres:Succeeded   https://doksi.barion.com/PaymentStatus
          //  $errors = $paymentState->Errors ?? 'nincs hiba';
 
       
       //paydata--------  
        $pay=Pay::where('payment_id',$paymentId )->first();
        $pay->update(['statusz' => $status]);
       // $pay->update(['note' => $errors]);
      
       //roletime data--------  
        if($status=='Succeeded'){
        $rData['user_id'] =  $pay->user_id;
                $rData['admin_id'] = 1;
                $rData['role_id'] = 3;
                $rData['payment_id'] =  $paymentId ;
                $rData['start'] = Carbon::now()->format('Y-m-d') ;
                $rData['end'] = Carbon::now()->addDay(30)->format('Y-m-d') ;
                //$data['note'] = ;
                RoleTime::create($rData);
        }
       
        
        
        

        /*
    //  return redirect('admin/roletimes')->with('flash_message', 'paying succesfull');
    $data['admin_id']=21;
    $data['role_id']=3;
    $data['user_id']=3;
    $data['start']='2019-09-14';
    $data['end']='2019-10-14';

    $data['note']='paymentId=nincs';
    $role = RoleTime::create($data);
    return response()->json(['paymentId' => 'valami']);*/
    }
}
/*
sikeres példa válasz
{"PaymentId":"9961d65d8fb642cfbb2c9029f8d0f6e1",
"PaymentRequestId":null,
"OrderNumber":null,
"POSId":"37716eb948244c918802b5e429089c82",
"POSName":"moshop",
"POSOwnerEmail":"menkuotto@gmail.com",
"Status":"Succeeded",
"PaymentType":"Immediate,
FundingSource":"BankCard",
"FundingInformation":{"BankCard":{"MaskedPan":"5559","BankCardType":"Visa","ValidThruYear":"2025","ValidThruMonth":"11"},"AuthorizationCode":"a7vewc"},
"AllowedFundingSources":["All"],
"GuestCheckout":true,"CreatedAt":"2019-08-29T21:52:52.284Z","ValidUntil":"2019-08-29T22:22:52.284Z","CompletedAt":"2019-08-29T21:53:06.665Z","ReservedUntil":null,"DelayedCaptureUntil":null,"Transactions":[{"TransactionId":"3b2557f28ad2457b82e56f7d71e71d81","POSTransactionId":"ABC-VC37S","TransactionTime":"2019-08-29T21:52:52.284Z","Total":400,"Currency":"HUF","Payer":{"Name":{"LoginName":"joseph-schmidt@example.com","FirstName":null,"LastName":null,"OrganizationName":null},"Email":"joseph-schmidt@example.com"},"Payee":{"Name":{"LoginName":"menkuotto@gmail.com","FirstName":"Ott\u00f3","LastName":"M\u00e9nk\u0171","OrganizationName":null},"Email":"menkuotto@gmail.com"},"Comment":null,"Status":"Succeeded","TransactionType":"CardPayment","Items":[{"Name":"Example item","Description":"This is a sample description","Quantity":1,"Unit":"db","UnitPrice":400,"ItemTotal":400,"SKU":null}],
"RelatedId":null,
"POSId":"37716eb948244c918802b5e429089c82",
"PaymentId":"9961d65d8fb642cfbb2c9029f8d0f6e1"},
{"TransactionId":"29b56b1438044e6faffe8ecb24221207",
"POSTransactionId":null,"TransactionTime":"2019-08-29T21:52:52.284Z","Total":4,"Currency":"HUF","Payer":{"Name":{"LoginName":"menkuotto@gmail.com","FirstName":"Ott\u00f3","LastName":"M\u00e9nk\u0171","OrganizationName":null},"Email":"menkuotto@gmail.com"},"Payee":{"Name":{"LoginName":null,"FirstName":null,"LastName":null,"OrganizationName":"Barion"},"Email":null},"Comment":null,"Status":"Succeeded","TransactionType":"CardProcessingFee","Items":null,"RelatedId":null,"POSId":"37716eb948244c918802b5e429089c82","PaymentId":"9961d65d8fb642cfbb2c9029f8d0f6e1"}],"Total":400,"SuggestedLocale":"hu-HU","FraudRiskScore":0,"RedirectUrl":"https:\/\/doc.mottoweb.hu\/payredirect?paymentId=9961d65d8fb642cfbb2c9029f8d0f6e1","CallbackUrl":"https:\/\/doc.mottoweb.hu\/callback?paymentId=9961d65d8fb642cfbb2c9029f8d0f6e1","Currency":"HUF","Errors":[]}}

 */
