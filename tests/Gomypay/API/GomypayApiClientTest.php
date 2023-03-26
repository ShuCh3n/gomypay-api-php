<?php

namespace Tests\Gomypay\API;

use Dotenv\Dotenv;
use eDiasoft\Gomypay\GomypayApiClient;
use PHPUnit\Framework\TestCase;

class GomypayApiClientTest extends TestCase
{
    protected GomypayApiClient $gomypay;
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(getcwd());
        $dotenv->load();

        $this->gomypay = new GomypayApiClient($_ENV['GOMYPAY_CUSTOMER_ID'], $_ENV['GOMYPAY_SECRET'], [
            'test'  => true
        ]);

        parent::__construct();
    }
}