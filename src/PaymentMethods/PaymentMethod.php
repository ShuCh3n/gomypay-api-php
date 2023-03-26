<?php

namespace eDiasoft\Gomypay\PaymentMethods;

use eDiasoft\Gomypay\Payloads\Payment;

abstract class PaymentMethod implements iPaymentMethod
{
    protected int $sendType;
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
        return $this->payload->toArray();
    }

    public function sendType(): int
    {
        return $this->sendType;
    }
}