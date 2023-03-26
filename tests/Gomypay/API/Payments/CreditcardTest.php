<?php

namespace Tests\Gomypay\API\Payments;

use eDiasoft\Gomypay\Types\Response;
use Tests\Gomypay\API\GomypayApiClientTest;

class CreditcardTest extends GomypayApiClientTest
{
    /**
     * @return void
     * @test
     */
    public function it_creates_a_creditcard_payment()
    {
        $response = $this->gomypay->payWith('creditcard')->create([
            'Order_No'          => 'TEST' . uniqid(), //Must be unique everytime
            'Amount'            => 1000, //Amount in TWD, must be more than 35 yuan
            'Buyer_Name'        => 'John Doe',
            'Buyer_Telm'        => '0912345678',
            'Buyer_Mail'        => 'john@example.com',
            'Buyer_Memo'        => 'Noodles',
            'CardNo'            => '4907060600015101', //Example creditcard number that results in success
            'ExpireDate'        => '2412', //YYMM
            'CVV'               => '615',
            'TransMode'         => '1',
            'Installment'       => '0',
            'Return_url'        => 'https://example2.com/gomypay/return',
            'Callback_Url'      => 'https://example2.com/gomypay/callback'
        ])->execute(Response::JSON);

        $this->assertTrue($response->isSuccess());
    }
}