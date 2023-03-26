<?php
namespace eDiasoft\Gomypay\Config;
abstract class Config
{
    private string $customerId;
    private ?string $secretKey = null;
    private bool $test = false;
    private string $returnUrl;
    private string $callbackUrl;

    public function __construct(string $customerId, ?string $secretKey = null, ?array $config = [])
    {
        $this->customerId = $customerId;
        $this->secretKey = $secretKey;

        $this->setConfigValues($config);
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property))
        {
            $this->$property = $value;
        }

        return $this;
    }

    protected function setConfigValues(array $config = [])
    {
        foreach($config as $key => $value)
        {
            $this->$key = $value;
        }
    }

    public function isLiveMode(): bool
    {
        return !$this->test;
    }
}