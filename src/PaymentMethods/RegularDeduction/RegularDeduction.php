<?php

namespace eDiasoft\Gomypay\PaymentMethods\RegularDeduction;

use eDiasoft\Gomypay\PaymentMethods\PaymentMethod;

class RegularDeduction extends PaymentMethod
{
    protected int $sendType = 5;
}