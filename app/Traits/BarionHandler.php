<?php
namespace App\Traits;

use App\Barion;
use App\Billingdata;
use App\Roletime;
use \Carbon\Carbon;
trait BarionHandler
{ 
    public function createBarionPay($barionid,$billingDataid,$order_id)
    {
        $user = \Auth::user();
        $userid = $user->id ?? 0;
            //paydata--------  order_id
            $data['user_id'] = $userid;
            $data['admin_id'] = 1; //1: root a gépi bevitelek pl barion ezt használják egyébként user_id
            $data['action_id'] = $barionid; // barion-id, nyugtaszám, paypal_id
            $data['billingdata_id'] = $billingDataid; //fizetési adataok
            $data['order_id'] = $order_id; // csomag azonosító 1-3
            $data['type'] = 'barion'; //barion, paypal, cash
            $data['total'] = $this->ordersData[$order_id]['total'];
            return \App\Pay::create($data);
    }
    public function createBarion($paymentState, $billingdata_id, $script='nincs')
    {
        [ 'payment_id', 'order_id', 'total', 'status', 'errors'];
        $user = \Auth::user();
        $userid = $user->id ?? 0;
        $data['user_id'] = $userid;
        $data['billingdata_id'] = $billingdata_id ?? 0;
        $data['payment_id'] = $paymentState->PaymentId;
        $data['order_id'] = $paymentState->Transactions[0]->Items[0]->Name ?? 'nincs';
        $data['total'] = $paymentState->Total ?? 0;
        $data['status'] = $paymentState->Status;
        $data['script'] = $script;
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

        $order = $this->ordersData[$pay->order_id];
        $days = $order['days'];
        $payid = $pay->id ?? 0;
        if ($payid > 0) {
            $rData['user_id'] = $pay->user_id;
            $rData['admin_id'] = 1;
            $rData['role_id'] = 3;
            $rData['pay_id'] = $payid;
            $rData['start'] = Carbon::now()->format('Y-m-d');
            $rData['end'] = Carbon::now()->addDay($days)->format('Y-m-d');
            return RoleTime::create($rData);
        }
    }

    public function prepareBarion($billingdata, $order_id)
    {

        $order = $this->ordersData[$order_id];
        $user = \Auth::user();
        return \Barion::paymentStart([
            'PaymentType' => 'IMMEDIATE',
            'GuestCheckOut' => true,
            'FundingSources' => ['ALL'],
            'Locale' => 'hu-HU',
            'Currency' => 'HUF',
            'PayerHint' => $user->email,
            'ShippingAddress' => [
                'Country' => "HU",
                'City' => $billingdata->city,
                'Zip' => $billingdata->zip,
                'Street' => $billingdata->address,
                'Street2' => "",
                'FullName' => $billingdata->cardname,
                // 'Phone' => "43259123456789",
            ],
            'RedirectUrl' => "https://doc.mottoweb.hu/barionredirect",
            'CallbackUrl' => "https://doc.mottoweb.hu/barioncallback",
            'Transactions' => [
                [
                    'POSTransactionId' => $billingdata->id . '-' . rand(100, 10000),
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
                        ],
                    ],
                ],
            ],
        ]);
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