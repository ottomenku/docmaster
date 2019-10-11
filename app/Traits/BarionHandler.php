<?php
namespace App\Traits;

use App\Barion;
use App\Bariontransaction;
use App\Billingdata;
use App\Pay;
use App\Roletime;
use \Carbon\Carbon;
//use Illuminate\Support\Facades\Auth;
trait BarionHandler
{
    /**
     * Ha a Pay-hez még nincs roletime csinál egyet
     * @return Roletime
     */
    public function createPayRoletime($pay)
    {
        $roletime = Roletime::where('pay_id', $pay->id)->first();
        $roletimeid = $roletime->id ?? null;
        if ($roletimeid == null) {
            $roletime = $this->setRoletime($pay);
        }
        return $roletime;
    }
    /**
     * Ha a tranzakcióhoz nég nincs pay csinál egyet
     * @return Pay
     */
    public function createTransactionPay($bariontransaction_id)
    {
        \Auth::check() ;
        $userid = \Auth::id() ?? 0;
        $pay = Pay::where('action_id', $bariontransaction_id)->first();
        $pay_id = $pay->id ?? null;
        if ($pay_id == null) {
            $bariontransaction = Bariontransaction::where('id', $bariontransaction_id)->first();
            //TODO:logolni ha nem érvényes a $bariontransaction_id
            $data['user_id'] = $userid;
            $data['admin_id'] = 1; //1: root a gépi bevitelek pl barion ezt használják egyébként user_id
            $data['action_id'] = $bariontransaction->id; // barion:post_transaction_id, nyugtaszám, paypal_id
            $data['billingdata_id'] = $bariontransaction->billingdata_id; //fizetési adataok
            $data['order_id'] = $order_id = $bariontransaction->order_id; // csomag azonosító 1-3
            $data['type'] = 'barion'; //barion, paypal, cash
            $data['total'] = $this->ordersData[$order_id]['total']; // elvileg az order_id elég lenne (redundancia)
            $data['days'] = $this->ordersData[$order_id]['days']; //de a csomag adatok változhatnak és konfigfájlban is
            $pay = Pay::create($data);
        }
        return $pay;
    }
/**
 * /test/barioncallback
 */
    public function barioncallbackHandler($paymentId,$script='callback')
    {
        $paymentState = \Barion::getPaymentState($paymentId);
        $res['status'] = $paymentState->Status ?? null; //sikeres:Succeeded   https://doksi.barion.com/PaymentStatus
        $data['errors'] = $paymentState->Errors ?? [];
        $data['noerror'] =false;
        if(empty($res['errors'])){$data['noerror'] =true;}
        //$res['message'] = ' Nem fizetős barionm hívás';
        // $errors = $paymentState-> ?? 'nincs hiba';
        $bariontransaction_id = explode('-', $paymentState->Transactions[0]->POSTransactionId)[0]; 
        $barion = $this->createBarion($paymentState, $bariontransaction_id, $script);
        $res['barion_id'] = $barion->id ?? null;

        if ($paymentState->Status == 'Succeeded') { //sikeres:Succeeded        
            $pay = $this->createTransactionPay($bariontransaction_id);
            $res['pay_id'] = $pay->id ?? null;
            $res['roletime_id'] =$this->createPayRoletime($pay)->id ?? null;
            //TODO: kipróbálni hogy ír-e már be useridet megoldva az use Illuminate\Support\Facades\Auth; helyett \Auth-ot kell használni
        }
        $data['res']=$res;
        return $data;
    }

/**
 * testing: browse, BarionTestController
 *  testroute: route /test/storetest
 */
    public function storeHandler($request)
    {
        $res = [];
        $order_id = $request->input('order_id') ?? 'max';
        $BC = null;
        $billing = $this->saveBillingDataGetBilling($request);
        $res['billingdata_id'] = $billing->id ?? null;

        $barionTransaction = $this->createBariontransaction($res['billingdata_id'], $order_id);
        $transid = $res['bariontransaction_id'] = $barionTransaction->id ?? null;
        $transtime = $res['time'] = $barionTransaction->time ?? null;

        $BC = $this->prepareBarion($billing, $transid . '-' . $transtime, $order_id);
        $data['errors'] = $BC->Errors ?? [];
        $data['noerror'] =false;
        if(empty($data['errors'])){$data['noerror'] =true;}
        $res['gateway'] = $BC->GatewayUrl ?? null;
        $res['RedirectUrl'] = $BC->RedirectUrl ?? null;
        $res['CallbackUrl'] = $BC->CallbackUrl ?? null;
        $barion = $this->createBarion($BC, $res['bariontransaction_id'], 'store');
        $res['barion_id'] = $barion->id ?? null;

        $data['res']=$res;
        return $data;

    }
    /**
     * egy barion transaction-t csinál
     * @return Bariontransaction
     */
    public function createBariontransaction($billingdata_id, $order_id)
    { 
        \Auth::check() ;
        //$user = Auth::user();
        $userid = \Auth::id() ?? 0;
        $data['time'] = time();
        $data['user_id'] = $userid;
        $data['billingdata_id'] = $billingdata_id; //fizetési adataok
        $data['order_id'] = $order_id; // csomag azonosító 1-3
        //$data['post_transaction_id'] //  nem kell mert a saját id+time de a time csak biztonsági  plusz  más asdatbázissal való összefésülhetőség miatt
        $data['total'] = $this->ordersData[$order_id]['total']; //nem elég az order_id mert a csomag adatok változhatnak
        $data['days'] = $this->ordersData[$order_id]['days']; //nem elég az order_id mert a csomag adatok változhatnak
        return Bariontransaction::create($data);
    }

    public function createBarion($paymentState, $transaction_id, $script = 'nincs')
    {
        $data['payment_id'] = $paymentState->PaymentId;
        $data['bariontransaction_id'] = $transaction_id; //?? $paymentState->Transactions->POSTransactionId ?? 'nincs';
        $data['script'] = $script;
        $data['status'] = $paymentState->Status;
        $data['fulljson'] = json_encode($paymentState);
        $data['errors'] = json_encode($paymentState->Errors);
        $barion = Barion::Create($data);
        return $barion;
    }
    public function saveBillingDataGetBilling($request)
    {

        $billing = Billingdata::firstOrCreate($request->only(['user_id', 'fullname', 'cardname', 'city', 'zip', 'address', 'tel', 'adosz']));
        return $billing;
    }

    public function setRoletime($pay)
    {

        $start = RoleTime::getRoleStart($pay->user_id, 3);

        $order = $this->ordersData[$pay->order_id];
        $days = $order['days'];
        $payid = $pay->id ?? 0;
        if ($payid > 0) {
            $rData['user_id'] = $pay->user_id;
            $rData['admin_id'] = 1;
            $rData['role_id'] = 3;
            $rData['pay_id'] = $payid;
            $rData['start'] = $start;
            $rData['end'] = Carbon::createFromFormat('Y-m-d', $start)->addDay($days)->format('Y-m-d');
            // Carbon::now()->addDay($days)->format('Y-m-d');
            return RoleTime::create($rData);
        }
    }
/**
 * $billingdata: ['user_id', 'fullname', 'cardname', 'city', 'zip', 'address',] lehet még:'tel', 'adosz'
 * $order_id: min, base, max (csomag nevek/azonosítók)
 *  testroute: /test/barionprepare
 */
    public function prepareBarion($billingdata, $transaction_id, $order_id)
    {
        $order = $this->ordersData[$order_id];
        $user = \Auth::user();
        $payeremail = $user->email ?? 'motto001@gmail.com';
        $paymentStartData = [
            'PaymentType' => 'IMMEDIATE',
            'GuestCheckOut' => true,
            'FundingSources' => ['ALL'],
            'Locale' => 'hu-HU',
            'Currency' => 'HUF',
            'PayerHint' => $payeremail,
            'ShippingAddress' => [
                'Country' => "HU",
                'City' => $billingdata->city,
                'Zip' => $billingdata->zip,
                'Street' => $billingdata->address,
                'Street2' => "",
                'FullName' => $billingdata->cardname,
                // 'Phone' => "43259123456789",
            ],
            'RedirectUrl' => config($this->configFile . '.RedirectUrl'), //kötelező!
            'CallbackUrl' => config($this->configFile . '.CallbackUrl'), // fölöslegesen nem kell megadni
            'Transactions' => [
                [
                    // 'POSTransactionId' =>  $transaction_id. '-' . rand(100, 10000),
                    'POSTransactionId' => $transaction_id,
                    'Payee' => $this->barionResEmail,
                    'Total' => $order['total'],
                    'Items' => [
                        [
                            'Name' => $order_id,
                            'Description' => $order['descripton'],
                            'Quantity' => 1,
                            'Unit' => 'db',
                            'UnitPrice' => $order['total'],
                            'ItemTotal' => $order['total'],
                        ]]]]];

        //    if(config($this->configFile .'.CallbackUrl')!=null)  //pl teszteléskor a construktorban kikapcsolni
        // {$paymentStartData['CallbackUrl']= config($this->configFile .'.CallbackUrl');}

        return \Barion::paymentStart($paymentStartData);
    }

}

//sikeres példa válasz  Transactions[[Items[[Name]],[items2]],  Errors, PaymentId
/*
public $g=json_decode(
{

"PaymentId":"ebdb3a8597344cc98ef8f1d8e25646ae",
"PaymentRequestId":null,
"OrderNumber":null,
"POSId":"37716eb948244c918802b5e429089c82",
"POSName":"moshop",
"POSOwnerEmail":"menkuotto@gmail.com",
"Status":"Succeeded",
"PaymentType":"Immediate",
"FundingSource":"BankCard",
"FundingInformation":{"BankCard":{"MaskedPan":"5559","BankCardType":"Visa","ValidThruYear":"2021","ValidThruMonth":"11"},"AuthorizationCode":"jc3s5p"},
"AllowedFundingSources":["All"],
"GuestCheckout":true,
"CreatedAt":"2019-09-21T02:47:14.852Z",
"ValidUntil":"2019-09-21T03:17:14.852Z",
"CompletedAt":"2019-09-21T02:47:46.736Z",
"ReservedUntil":null,"DelayedCaptureUntil":null,
"Transactions":
[
{"TransactionId":"e2a3bdda79ff42008e95afbc2289769c",
"POSTransactionId":"2-6238",
"TransactionTime":"2019-09-21T02:47:14.852Z","Total":800,
"Currency":"HUF",
"Payer":
{
"Name":
{
"LoginName":"otto@gmail.com","FirstName":null,"LastName":null,"OrganizationName":null
},
"Email":"otto@gmail.com"
},
"Payee":
{
"Name":{
"LoginName":"menkuotto@gmail.com",
"FirstName":"Ott\u00f3",
"LastName":"M\u00e9nk\u0171",
"OrganizationName":null
},
"Email":"menkuotto@gmail.com"
},
"Comment":null,
"Status":"Succeeded",
"TransactionType":"CardPayment",
"Items":
[
{
"Name":"f\u00e9l\u00e9v",
"Description":"six month",
"Quantity":1,"Unit":"db",
"UnitPrice":800,
"ItemTotal":800,
"SKU":null
}
],
"RelatedId":null,
"POSId":"37716eb948244c918802b5e429089c82",
"PaymentId":"ebdb3a8597344cc98ef8f1d8e25646ae"
},
{
"TransactionId":"816c34e495bd452ba0e9ec77423c7c4b",
"POSTransactionId":null,
"TransactionTime":"2019-09-21T02:47:14.871Z",
"Total":8,
"Currency":"HUF",
"Payer":
{
"Name":
{"
LoginName":"menkuotto@gmail.com",
"FirstName":"Ott\u00f3",
"LastName":"M\u00e9nk\u0171",
"OrganizationName":null
},
"Email":"menkuotto@gmail.com"
},
"Payee":
{
"Name":
{
"LoginName":null,
"FirstName":null,
"LastName":null,
"OrganizationName":"Barion"
},
"Email":null},
"Comment":null,
"Status":"Succeeded",
"TransactionType":"CardProcessingFee",
"Items":null,
"RelatedId":null,
"POSId":"37716eb948244c918802b5e429089c82",
"PaymentId":"ebdb3a8597344cc98ef8f1d8e25646ae"
}
],
"Total":800,
"SuggestedLocale":"hu-HU",
"FraudRiskScore":0,
"RedirectUrl":"https:\/\/doc.mottoweb.hu\/barionredirect?paymentId=ebdb3a8597344cc98ef8f1d8e25646ae",
"CallbackUrl":"https:\/\/doc.mottoweb.hu\/barioncallback?paymentId=ebdb3a8597344cc98ef8f1d8e25646ae",
"Currency":"HUF",
"Errors":[]
}, true);

}*/
