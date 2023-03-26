<?php

namespace eDiasoft\Gomypay\PaymentMethods;

use eDiasoft\Gomypay\Payloads\Payment;

abstract class PaymentMethod implements iPaymentMethod
{
    protected int $Send_Type;
    protected Payment $payload;

    public function __construct()
    {
        $this->payload = new Payment;
    }

    public function create(array|string $payload)
    {
        $this->payload->append($payload);
    }

    public function getPayload(): array
    {
        dd($this->payload->toArray());

        return [];
    }
}