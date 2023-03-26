<?php

namespace eDiasoft\Gomypay\PaymentMethods;

use eDiasoft\Gomypay\Config\Config;
use eDiasoft\Gomypay\Exceptions\GomypayException;
use eDiasoft\Gomypay\HttpAdapter\HttpAdapterInterface;
use eDiasoft\Gomypay\HttpAdapter\HttpAdapterPicker;
use eDiasoft\Gomypay\PaymentMethods\Creditcard\Barcode;
use eDiasoft\Gomypay\PaymentMethods\Creditcard\Code;
use eDiasoft\Gomypay\PaymentMethods\Creditcard\Creditcard;
use eDiasoft\Gomypay\PaymentMethods\Creditcard\UnionPay;
use eDiasoft\Gomypay\PaymentMethods\Creditcard\WebATM;
use eDiasoft\Gomypay\Types\Http;
use eDiasoft\Gomypay\Types\PaymentMethods;
use LinePay;
use RegularDeducation;
use VirtualAccount;

class PaymentFacade
{
    const LIVE_URL = 'https://n.gomypay.asia/ShuntClass.aspx';
    const TEST_URL = 'https://n.gomypay.asia/TestShuntClass.aspx';

    private Config $config;
    private HttpAdapterInterface $httpClient;
    private iPaymentMethod $paymentMethod;

    public function __construct(Config $config, string $method)
    {
        $this->config = $config;

        $this->httpClient = (new HttpAdapterPicker())->pickHttpAdapter();

        $this->setPaymentMethod($method);
    }

    public function __call(string $name , array $arguments)
    {
        if($name == 'create')
        {
            $this->paymentMethod->create($arguments[0] ?? []);
        }

        return $this;
    }

    public function execute()
    {
        dd($this->paymentMethod->getPayload());
        $url = ($this->config->isLiveMode())? self::LIVE_URL : self::TEST_URL;

        dd($this->httpClient->send(Http::POST, $url));
    }

    private function setPaymentMethod(string $method): iPaymentMethod
    {
        switch ($method){
            case PaymentMethods::CREDITCARD:
                return $this->paymentMethod = new Creditcard;
            case PaymentMethods::UNIONPAY:
                return $this->paymentMethod = new UnionPay;
            case PaymentMethods::SPMBARCODE:
                return $this->paymentMethod = new Barcode;
            case PaymentMethods::WEBATM:
                return $this->paymentMethod = new WebATM;
            case PaymentMethods::VIRTUALACCOUNT:
                return $this->paymentMethod = new VirtualAccount;
            case PaymentMethods::REGULARDEDUCTION:
                return $this->paymentMethod = new RegularDeducation;
            case PaymentMethods::SPMCODE:
                return $this->paymentMethod = new Code;
            case PaymentMethods::LINEPAY:
                return $this->paymentMethod = new LinePay;
        }

        throw new GomypayException("Given payment method is not known. Please read the documentation about the available payment methods.");
    }
}