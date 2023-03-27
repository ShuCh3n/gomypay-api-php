<?php

namespace eDiasoft\Gomypay\PaymentMethods\WebATM;

use eDiasoft\Gomypay\PaymentMethods\PaymentMethod;

class WebATM extends PaymentMethod
{
    protected int $sendType = 3;
}