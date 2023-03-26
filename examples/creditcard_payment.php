<?php
//Login to see credentials https://n.gomypay.asia/MCLogin.aspx

use eDiasoft\GomypayApiClient;
use eDiasoft\Types\Response;

$gomypay = new GomypayApiClient('CUSTOMER_ID');

$creditcard = $gomypay->payWith('creditcard')->create([
    'Pay_Mode_No'    => '2',
    'Order_No'      => uniqid(), //Must be unique everytime
    'Amount'        => 1000, //Amount in TWD, must be more than 35 yuan
    'TransCode'     => '00',
    'Buyer_Name'    => 'John Doe',
    'Buyer_Telm'    => '0912345678',
    'Buyer_Mail'    => 'john@example.com',
    'Buyer_Memo'    => 'Noodles',
    'CardNo'        => '4907060600015101', //Example creditcard number that results in success
    'ExpireDate'    => '2412', //YYMM
    'CVV'           => '615',
    'TransMode'     => '1',
    'Installment'   => '0',
    'Return_url'    => 'https://example.com/gomypay/return',
    'Callback_Url'    => 'https://example.com/gomypay/callback'
]);

$creditcard->execute(); //Normal execute with redirect to Gomypay page

$creditcard->execute(Response::json); //Request json response