<?php

namespace eDiasoft\Gomypay\PaymentMethods\Creditcard;

use eDiasoft\Gomypay\PaymentMethods\Creditcard\Payloads\Payment;
use eDiasoft\Gomypay\PaymentMethods\PaymentMethod;

class Creditcard extends PaymentMethod
{
    protected int $Send_Type = 1;
    public function create(array|string $payload)
    {
        $this->payload = new Payment($payload);
    }
}