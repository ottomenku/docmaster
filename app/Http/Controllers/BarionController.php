<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\RoleTime;
use Illuminate\Http\Request;

require_once '../library/BarionClient.php';

class BarionController extends Controller
{
use \App\Traits\BarionHandler;
    public function billingdata($id)
    {
        $user = \Auth::user();
        $userid = $user->id ?? 0;
        if ($userid < 1) {
            return view('cristal.needlogin');
        } else {
            $data['id'] = $id;
            return view('cristal.billingdata', compact('data'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function pay(Request $request)
    {
        $data=[];
        $validator = \Validator::make($request->all(), [
            //'email' => 'required|email|unique:users',
            'name' => 'required|string|max:200',
            //  'password' => 'required'
        ]);
        if ($validator->fails()) {

            $data['id'] = $request->id;
            //$data['hiba'] = $validator->error_get_last ?? '';
            return response()->json(['html' => view('cristal.billingdata', compact('data'))->withErrors($validator)->render()]);
        } else {

           $data = saveBillingData($request);
            $BC =  prepareBarion($data)
;            $paymentid = $BC->PaymentId;
            $error = $BC->Errors;
            $gateway = $BC->GatewayUrl;
            if (empty($error)) {
                return redirect($gateway);
            } else {
                return response()->json(['error' => $error]);

            }
        }

    }

    public function redirect(Request $request)
    {
        
        $paymentId = $request->get("paymentId");

        $data['admin_id'] = 21;
        $data['role_id'] = 3;
        $data['user_id'] = 3;
        $data['start'] = '2019-09-14';
        $data['end'] = '2019-10-14';

        if (!empty($paymentId)) {
            $paymentState = \Barion::getPaymentState($paymentId);
            $status = $paymentState->Status; //sikeres:Succeeded   https://doksi.barion.com/PaymentStatus
            $errors = $paymentState->Errors;

            if ($status == 'Succeeded') {$data['note'] = 'paymentId=' . $paymentId;} else {
                $data['note'] = 'sikertelen';}

        } else {
            $data['note'] = 'paymentId=nincs';
        }
        RoleTime::create($data);
        return response()->json(['pay' => 'redirect']);

    }

    public function callback(Request $request)
    {
        //$this->validate($request, ['name' => 'required']);
        //   $paymentid=$request->get("paymentId") ?? $_GET['paymentId'] ;
        $paymentId = $request->get("paymentId");

        $data['admin_id'] = 21;
        $data['role_id'] = 3;
        $data['user_id'] = 3;
        $data['start'] = '2019-09-14';
        $data['end'] = '2019-10-14';

        if (!empty($paymentId)) {
            $paymentState = \Barion::getPaymentState($paymentId);
            $status = $paymentState->Status; //sikeres:Succeeded   https://doksi.barion.com/PaymentStatus
            $errors = $paymentState->Errors;

            if ($status == 'Succeeded') {$data['note'] = 'paymentId=' . $paymentId;} else {
                $data['note'] = 'sikertelen';}

        } else {
            $data['note'] = 'paymentId=nincs';
        }
        RoleTime::create($data);

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
