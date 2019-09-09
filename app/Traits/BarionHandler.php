<?php
namespace App\Traits;

trait BarionHandler
{
    public  function saveBillingData($request)
    {
        return $data;
    }
    public  function prepareBarion($data)
    {
        return \Barion::paymentStart([
                'PaymentType' => 'IMMEDIATE',
                'GuestCheckOut' => true,
                'FundingSources' => ['ALL'],
                'Locale' => 'hu-HU',
                'Currency' => 'HUF',
                'PayerHint' => "joseph-schmidt@example.com",
                'ShippingAddress' => [
                    'Country' => "AT",
                    'City' => "Salzburg",
                    'Zip' => "1234",
                    'Street' => "13 Etwas Strasse",
                    'Street2' => "",
                    'FullName' => "Joseph Schmidt",
                    'Phone' => "43259123456789",
                ],
                'RedirectUrl' => "https://doc.mottoweb.hu/barionredirect",
                'CallbackUrl' => "https://doc.mottoweb.hu/barioncallback",
                'Transactions' => [
                    [
                        'POSTransactionId' => 'ABC-' . $rand,
                        'Payee' => 'menkuotto@gmail.com',
                        'Total' => 400,
                        'Items' => [
                            [
                                'Name' => 'Example item',
                                'Description' => 'This is a sample description',
                                'Quantity' => 1,
                                'Unit' => 'db',
                                'UnitPrice' => 400,
                                'ItemTotal' => 400,
                            ],
                        ],
                    ],
                ],
            ]);
    }
}