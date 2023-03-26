<?php

namespace eDiasoft\Gomypay\Payloads;

class Payment extends Payload
{
    protected int $Pay_Mode_No = 2;
    protected string $Order_No;
    protected string $Amount;
    protected string $TransCode = '00';
    protected string $Buyer_Name;
    protected string $Buyer_Telm;
    protected string $Buyer_Mail;
    protected string $Buyer_Memo;
    protected string $Return_url;
    protected string $Callback_Url;
}