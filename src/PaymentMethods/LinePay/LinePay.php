<?php

namespace eDiasoft\Gomypay\PaymentMethods\LinePay;

use eDiasoft\Gomypay\PaymentMethods\PaymentMethod;

class LinePay extends PaymentMethod
{
    protected int $sendType = 7;
}