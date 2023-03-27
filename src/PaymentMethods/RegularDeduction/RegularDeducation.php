<?php

namespace eDiasoft\Gomypay\PaymentMethods\RegularDeducation;

use eDiasoft\Gomypay\PaymentMethods\PaymentMethod;

class RegularDeducation extends PaymentMethod
{
    protected int $sendType = 5;
}