<?php

namespace eDiasoft\Gomypay\PaymentMethods\VirtualAccount;

use eDiasoft\Gomypay\PaymentMethods\PaymentMethod;

class VirtualAccount extends PaymentMethod
{
    protected int $sendType = 4;
}