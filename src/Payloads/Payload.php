<?php

namespace eDiasoft\Gomypay\Payloads;

use eDiasoft\Gomypay\Types\Arrayable;

abstract class Payload implements Arrayable
{
    public function __construct(array|string $payload = [])
    {
        $this->append($payload);
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property))
        {
            $this->$property = $value;
        }

        return $this;
    }

    public function append(array|string $payloads)
    {
        if(gettype($payloads) == 'string')
        {
            return $this->append(json_decode($payloads, true));
        }

        foreach($payloads as $key => $value)
        {
            $this->$key = $value;
        }

        return $this;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}