<?php

namespace eDiasoft\Gomypay\PaymentMethods\UnionPay;

use eDiasoft\Gomypay\PaymentMethods\PaymentMethod;

class UnionPay extends PaymentMethod
{
    protected int $sendType = 1;
}