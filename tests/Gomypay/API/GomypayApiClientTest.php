<?php

namespace Tests\Gomypay\Api;

use Dotenv\Dotenv;

class GomypayApiClientTest
{

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(getcwd());
        $dotenv->load();

        $this->buckaroo = new BuckarooClient($_ENV['BPE_WEBSITE_KEY'], $_ENV['BPE_SECRET_KEY']);

        parent::__construct();
    }
}