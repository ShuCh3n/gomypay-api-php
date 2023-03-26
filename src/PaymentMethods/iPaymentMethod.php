<?php

namespace eDiasoft\Gomypay\PaymentMethods;

interface iPaymentMethod
{
    public function create(array|string $payload);
    public function getPayload(): array;
}