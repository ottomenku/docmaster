<?php

namespace App\Http\Controllers;

use App\Barion;
use App\Http\Controllers\Controller;
use App\Pay;
use App\Roletime;
use Illuminate\Http\Request;

//use Illuminate\Foundation\Http\FormRequest ;
require_once '../library/BarionClient.php';

class BarionTestController extends Controller
{
    use \App\Traits\BarionHandler;
    //helyi adatok
    private $configFile = 'app'; // Ha lesz külön config az applikációnak oda át tehető
    private $userid;

    //a copnfigfájlból betöltött adatok constri
    public $barionResEmail; //a barion user emailje kell.(menkuotto@gmail.com) BarioHandler->prepareBarion();
    public $ordersData; //csomag dijak, adatok

    public function __construct()
    {
        $user = \Auth::user();
        $this->userid = $user->id ?? 0;
        $this->barionResEmail = config($this->configFile . '.barionResEmail');
        $this->ordersData = config($this->configFile . '.ordersData'); 
       config([$this->configFile.'.CallbackUrl' => null]);
    }


/**
 * A callbackot a barion hivja meg minden statusz változásnál. 200 as válasz kell adnia különben üjra hívja
 * a routot a barion controllerben megadott konfig fájlban kell deklarálni
 * ellenőrzi hogy ilyen statussal és ilyen transaction_id (Transactions->POSTransactionId)-el van e már mentett barion ha nincs menti
 * ha a status Succededeed  és még nincs beállítva  a fizetés, és a letöltési jog beállítja.
 * testroute: /test/barioncallback
 *  @return Json
 */
public function barioncallbackTest(Request $request)
{   $paymentId = $request->get("paymentId");
    $data= $this-> barioncallbackHandler($paymentId);
    return view('cristal.test.reswrite', compact('data'));
  
}


    /**
     * Menti a fizetési és a prerpared barion adatokat
     * Json választ küld. Vagy hiba üzenttel
     *  vagy a gatewayel, ami alapján a hívó script átirányít a barion fizetési oldalra
     * testroute: /test/storetest
     * @return Json
     */
    public function storeTest()
    {
        $res = [];
        $request = \Request::create('/test/storetest', 'POST', [
            'id' => 1, //nem kell
            'user_id' => 11,
            'fullname' => 'Ménkű Ottó',
            'cardname' => 'Ménkű Ottó',
            'city' => 'Jászberény',
            'zip' => 5100,
            'address' => 'Liliom u.1',
            'tel' => '70/5588301',
            'adosz' => '564646465456', //nem kell
        ]);

        $data = $this->storeHandler($request);
   /*     $messages=[
            'gateway'=>'nogtw', 
            'billingdata_id'=>'nobill',
            'bariontransaction_id'=>'nobartrans',
            'barion_id'=>'nobar', 
            'RedirectUrl'=>'noredir',
            'CallbackUrl'=>'nocall' 
        ];*/
      
        return view('cristal.test.reswrite', compact('data'));

    }
/**
 * testroute: /test/barionprepare
 */
    public function prepareBarionTest()
    {
        $res = [];
        $request = \Request::create('/test/barionprepare', 'POST', [
            'id' => 1, //nem kell
            'user_id' => 11,
            'fullname' => 'Ménkű Ottó',
            'cardname' => 'Ménkű Ottó',
            'city' => 'Jászberény',
            'zip' => 5100,
            'address' => 'Liliom u.1',
            'tel' => '70/5588301',
            'adosz' => '564646465456', //nem kell
        ]);
      //  prepareBarion($billingdata, $transaction_id, $order_id)
        $BC = $this->prepareBarion($request, 11, "min");
        $data['errors'] = $BC->Errors ?? [];
        $data['noerror'] =false;
        if(empty($data['errors'])){$data['noerror'] =true;}
        $res['gateway'] = $BC->GatewayUrl ?? null;
      //  $res['gateway'] = $BC->GatewayUrl ?? 'localhost';
        $data['res']=$res;
        return view('cristal.test.reswrite', compact('data'));
    }
/**
 * A barion hivja meg a fizetési tranzakció végéen
 * a routot a barion controllerben megadott konfig fileban kell deklarálni
 * ha a status Succededeed ellenőrzi hogy a callback beírta -e a fizetést és beállította-e a jogot
 * van -e ilyen statussal és ilyen transaction_id (Transactions->POSTransactionId) rendelkező Pay
 *  van e ezzel a pay_id-el rendelkező Roletimes
 *  ha nincs létrehozza  és siker üzenetet küld a home routra.
 * ha nem sikerül, hibauzenetet jelenít meg szintén a home routon
 * /test/barionredirect
 *  @return redirect-view
 */
    public function barionredirectTest(Request $request)
    {

        $paymentId = $request->get("paymentId");
        $paymentState = \Barion::getPaymentState($paymentId);
        $barion = createBarion($paymentState, $paymentState->Transactions->POSTransactionId, 'barionredirect');
        if ($paymentState->Status == 'Succeeded') { //sikeres:Succeeded   https://doksi.barion.com/PaymentStatus
            $pay = $this->createBarionPay(111, 11, 'min');
            $roletime = $this->setRoletime($pay);
            return redirect('/home')->with('flash_message', 'Barion fizetés sikeres volt. Letöltési jog beállítva');
        } else {

            return redirect('/home')->with('flash_message', 'Hiba történ a Barion fizetés közben');
        }

    }

/**
 *  Csak kiirjía paymentId-hez tartozó json választ a szerkezet tanulmányozásához
 *  alul van kikommentelve egy minta
 */
    public function bckiir($id)
    {
        //$paymentState = ['barionResEmail'=>$this->barionResEmail ,'ordersData'=>$this->ordersData ];
        $paymentState = \Barion::getPaymentState($id);
        return response()->json($paymentState);
    }

    public function messagetest()
    {
        return redirect('/')->with('flash_message', 'Teszt üzenet');
    }
    public function errortest(Request $request)
    {
        $data['categories'] = Category::all();
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:200',
        ]);
        return view('cristal.index', compact('data'))->withErrors($validator);
    }

}
/*POSTransactionId
sikeres példa válasz
{"PaymentId":"ebdb3a8597344cc98ef8f1d8e25646ae",
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
"Transactions":[{"TransactionId":"e2a3bdda79ff42008e95afbc2289769c",
"POSTransactionId":"2-6238",
"TransactionTime":"2019-09-21T02:47:14.852Z","Total":800,
"Currency":"HUF",
"Payer":{
"Name":{
"LoginName":"otto@gmail.com","FirstName":null,"LastName":null,"OrganizationName":null},
"Email":"otto@gmail.com"
},
"Payee":{
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
"Items":[{
"Name":"f\u00e9l\u00e9v",
"Description":"six month",
"Quantity":1,"Unit":"db",
"UnitPrice":800,
"ItemTotal":800,
"SKU":null
}],
"RelatedId":null,
"POSId":"37716eb948244c918802b5e429089c82",
"PaymentId":"ebdb3a8597344cc98ef8f1d8e25646ae"
},
{"TransactionId":"816c34e495bd452ba0e9ec77423c7c4b",
"POSTransactionId":null,
"TransactionTime":"2019-09-21T02:47:14.871Z",
"Total":8,
"Currency":"HUF",
"Payer":{
"Name":{"
LoginName":"menkuotto@gmail.com",
"FirstName":"Ott\u00f3",
"LastName":"M\u00e9nk\u0171",
"OrganizationName":null},
"Email":"menkuotto@gmail.com"},
"Payee":{
"Name":{
"LoginName":null,
"FirstName":null,
"LastName":null,
"OrganizationName":"Barion"},
"Email":null},
"Comment":null,
"Status":"Succeeded",
"TransactionType":"CardProcessingFee",
"Items":null,
"RelatedId":null,
"POSId":"37716eb948244c918802b5e429089c82",
"PaymentId":"ebdb3a8597344cc98ef8f1d8e25646ae"}],
"Total":800,
"SuggestedLocale":"hu-HU",
"FraudRiskScore":0,
"RedirectUrl":"https:\/\/doc.mottoweb.hu\/barionredirect?paymentId=ebdb3a8597344cc98ef8f1d8e25646ae",
"CallbackUrl":"https:\/\/doc.mottoweb.hu\/barioncallback?paymentId=ebdb3a8597344cc98ef8f1d8e25646ae",
"Currency":"HUF",
"Errors":[]}
 */
