<?php

namespace eDiasoft\Gomypay;

use eDiasoft\Gomypay\Config\Config;
use eDiasoft\Gomypay\Config\DefaultConfig;
use eDiasoft\Gomypay\PaymentMethods\PaymentFacade;

class GomypayApiClient
{
    private Config $config;
    public function __construct(string $customerID, ?string $secret = null, ?array $config = [])
    {
        $this->config = new DefaultConfig($customerID, $secret, $config);
    }

    public function payWith(string $method): PaymentFacade
    {
        return new PaymentFacade($this->config, $method);
    }

    public function setConfig(Config $config)
    {
        $this->config = $config;

        return $this;
    }
}