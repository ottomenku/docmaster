<?php

namespace App\Http\Controllers;

use App\Billingdata;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Pay;
use Illuminate\Http\Request;



//use Illuminate\Foundation\Http\FormRequest ;
//require_once '../library/BarionClient.php';
//TODO: duplán írja be a bariontransactions-t megoldva. a formot elküldte az ajax is meg a submit is.  asubmit gombot formon kívülre raktam
class BarionController extends Controller
{
    use \App\Traits\BarionHandler;
    //helyi adatok
    private $configFile = 'app'; // Ha lesz külön config az applikációnak oda át tehető
    private $userid; 

    //a copnfigfájlból betöltött adatok
    public $barionResEmail; //a barion user emailje kell.(menkuotto@gmail.com) BarioHandler->prepareBarion();
    public $ordersData; //csomag dijak, adatok

    public function __construct()
    {  // \Auth::check() ;
        //$user = Auth::user();
      //  $this->userid = \Auth::id() ?? 0;
        $this->barionResEmail = config($this->configFile . '.barionResEmail');
        $this->ordersData = config($this->configFile . '.ordersData');
    }
    /**
     * Json tömbel tér vissza A html elemben a biilingdata formmal
     *  han incs bejelentkezve a felhasználó akkorr a login formal
     *  @return Json
     */
    public function billingdataformJson($order_id)
    {
       if (\Auth::check() == FALSE) {  
        return response()->json(['html' => view('cristal.needlogin')->render()]);
       // return response()->json(['html' => 'userid:'.$this->userid ]);
       } else {
            $data = Billingdata::where('user_id', Auth::id())->latest()->first();
            $data['order_id'] = $order_id;
            $data['user_id'] = \Auth::id();
            return response()->json(['csrf_token' =>csrf_token() ,'html' => view('cristal.billingdata', compact('data'))->render()]);
      }
    }

    /**
     *a z App\Traits\BarionHandler->storeHandler()-el készít egy barion tranzakciót.
     * A requestből Menti a fizetési adatokat
     * Készít egy prerpared_bariont és az adataival ment egy barion rekordot.
     * Json választ küld a gatewayel, ami alapján a hívó script átirányít a barion fizetési oldalra
     *  Vagy hiba üzenttelg
     * route: /pay
     * @return Json
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            //'email' => 'required|email|unique:users',
            'fullname' => 'required|string|max:200',
            'cardname' => 'required|string|max:200',
        ]);
        $data = $this->storeHandler($request); $data['res'];
        if ( $data['noerror']) {
            return response()->json(['csrf_token' =>csrf_token() ,'gateway' => $data['res']['gateway'], 'html' => '<h4>Átirányítás</h4>']); // ajax script irányítja át az oldalt
        } else {
            return response()->json(['csrf_token' =>csrf_token() ,'statusz' => 'hiba', 'html' => json_encode($data['errors'])]);
        }
    }
/**
 * A barion hivja meg a fizetési tranzakció végéen
 * a routot a az App\Traits\BarionHandler\prepareBarion() -ben kell megadni
 * ha a status Succededeed ellenőrzi hogy a callback beírta -e a fizetést és beállította-e a jogot
 * van -e ilyen statussal és ilyen transaction_id (Transactions->POSTransactionId) rendelkező Pay
 *  van e ezzel a pay_id-el rendelkező Roletimes
 *  ha nincs létrehozza  és siker üzenetet küld a home routra.
 * ha nem sikerül, hibauzenetet jelenít meg szintén a home routon
 *  @return redirect-view
 */
    public function barionredirect(Request $request)
    {
        $paymentId = $request->get("paymentId");
        $data= $this-> barioncallbackHandler($paymentId);
        $status=$data['res']['status'] ?? '';
  
        if ($status == 'Succeeded') { //sikeres:Succeeded   https://doksi.barion.com/PaymentStatus
            return redirect('/home')->with('flash_message', 'Barion fizetés sikeres volt. Letöltési jog beállítva');
        } else {
            return redirect('/home')->with('flash_message', 'Hiba történ a Barion fizetés közben');
        }
    }
/**
 * A barion hivja meg minden statusz változásnál. 200 as válasz kell adnia különben üjra hívja
 * a routot a barion controllerben megadott konfig fájlban kell deklarálni
 * ellenőrzi hogy ilyen statussal és ilyen transaction_id (Transactions->POSTransactionId)-el van e már mentett barion ha nincs menti
 * ha a status Succededeed  és még nincs beállítva  a fizetés, és a letöltési jog beállítja.
 * testroute: /test/barioncallback
 *  @return Json
 */
    public function barioncallback(Request $request)
    {
        $paymentId = $request->get("paymentId");
        $data= $this-> barioncallbackHandler($paymentId);
        $res['status'] =$data['res']['status'] ?? '';
        if ($res['status'] == 'Succeeded') {
            $res['html'] ='<h4>Barion tranzakció sikeres:</h4> ';
        } else { $res['html'] = '<h4>Sikertelen barion fizetés</h4> ';}

        return response()->json($res);
    }
/**
 * teszteléshez. Csak kiirjía paymentId-hez tartozó json választ
 */
    public function bckiir($id)
    {
        //$paymentState = ['barionResEmail'=>$this->barionResEmail ,'ordersData'=>$this->ordersData ];
        $paymentState = \Barion::getPaymentState($id);
        return response()->json($paymentState);
    }

/*
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
 */

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
