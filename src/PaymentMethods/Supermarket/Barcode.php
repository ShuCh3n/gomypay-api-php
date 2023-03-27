<?php

namespace eDiasoft\Gomypay\PaymentMethods\Supermarket;

use eDiasoft\Gomypay\PaymentMethods\PaymentMethod;

class Barcode extends PaymentMethod
{
    protected int $sendType = 2;
}