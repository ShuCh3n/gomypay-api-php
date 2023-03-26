<?php

namespace eDiasoft\Gomypay\PaymentMethods\Creditcard\Payloads;

class Payment extends \eDiasoft\Gomypay\Payloads\Payment
{
    protected string $CardNo;
    protected string $ExpireDate;
    protected string $CVV;
    protected int $TransMode = 1;
    protected int $Installment = 0;
}