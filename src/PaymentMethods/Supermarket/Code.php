<?php

namespace eDiasoft\Gomypay\PaymentMethods\Supermarket;

use eDiasoft\Gomypay\PaymentMethods\Supermarket\Payloads\Payment;
use eDiasoft\Gomypay\PaymentMethods\PaymentMethod;

class Code extends PaymentMethod
{
    protected int $sendType = 6;

    public function create(array|string $payload)
    {
        $this->payload = new Payment($payload);
    }
}