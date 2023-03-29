<p align="center">
  <img src="https://user-images.githubusercontent.com/7081446/223246488-77debf08-5f0b-47da-b15b-a51b6038352f.png" width="128" height="128"/>
</p>
<p align="center"></p>
<h1 align="center">台灣萬事達 Gomypay 金流 API client for PHP</h1>

![gomypay_reamdme_header](https://user-images.githubusercontent.com/7081446/227977994-5f19a7f1-f41a-41ca-b16e-e163acd26e0e.png)

<a href="https://www.buymeacoffee.com/shuch3n" target="_blank">
    <img width="100" alt="yellow-button" src="https://user-images.githubusercontent.com/7081446/223840887-a22159f2-4830-44d5-ad68-98eaea370e66.png">
</a>

<p>
    This is not the official package! This PHP library allows developer to easily interact with the Gomypay API to access data and process payments. 
</p>

## Requirements ##
To use the Gomypay API client, the following things are required:

+ Get yourself a Gomypay [account](https://n.gomypay.asia/MRegister.aspx).
+ Now you're ready to use the Gomypay API client.
+ PHP >= 7.4
+ Up-to-date OpenSSL (or other SSL/TLS toolkit)

## Composer Installation ##
By far the easiest way to install the Tyre24 API client is to require it with [Composer](http://getcomposer.org/doc/00-intro.md).

    $ composer require ediasoft/gomypay-api-php:^1.0

    {
        "require": {
            "ediasoft/gomypay-api-php": "^1.0"
        }
    }

Alternatively, you can manually [download](https://github.com/eDiasoft/gomypay-api-php/packages) the library and include it in your project.

## Getting started ##

### Initialization ###

First, you must initialize the `GomypayApiClient` class and pass the customer id into it. The secret key is optional and only required when retrieving JSON response instead of the standard redirect response. Another optional parameter is the config array, and you can set the mode (test/live) and the default return and callback URL. By default all transaction is set to live.

```php
use eDiasoft\Gomypay\GomypayApiClient;

$gomypay = new GomypayApiClient('CUSTOMER_ID', 'SECRET_KEY_THIS_IS_OPTIONAL', array(
    'test'              => true, //This will change the transaction to test.
    'store_id'          => 'GOMYPAY_STORE_ID',  //Set the store id.
    'returnUrl'         => 'https://example.com/gomypay/return',
    'callbackUrl'       => 'https://example.com/gomypay/callback'
));
```

### Sending Creditcard Request ###

This example shows how to send a creditcard request

```php
use eDiasoft\Gomypay\Types\PaymentMethods;

$creditcard = $gomypay->payWith(PaymentMethods::CREDITCARD)->create([
    'Order_No'      => uniqid(), //Must be unique everytime
    'Amount'        => 1000, //Amount in TWD, must be more than 35 yuan
    'Buyer_Name'    => 'John Doe',
    'Buyer_Telm'    => '0912345678',
    'Buyer_Mail'    => 'john@example.com',
    'Buyer_Memo'    => 'Noodles',
    'CardNo'        => '4907060600015101', //Example creditcard number that results in success
    'ExpireDate'    => '2412', //YYMM
    'CVV'           => '615'
]);
```

Once the request is created, you can execute the request. There are two ways you can do it. To get the JSON response, you must fill in the secret key and the store id. The JSON request automatically checks against the md5 str_check.
```php
use eDiasoft\Gomypay\Types\Response;

$creditcard->execute(); //Normal execute with redirect to Gomypay page

$creditcard->execute(Response::json); //Request json response
```
### Available payment methods ###

+ 信用卡 `$gomypay->payWith(PaymentMethods::CREDITCARD)`
+ 銀聯卡 `$gomypay->payWith(PaymentMethods::UNIONPAY)`
+ 超商條碼 `$gomypay->payWith(PaymentMethods::SPMBARCODE)`
+ WebAtm `$gomypay->payWith(PaymentMethods::WEBATM)`
+ 虛擬帳號 `$gomypay->payWith(PaymentMethods::VIRTUALACCOUNT)`
+ 定期扣款 `$gomypay->payWith(PaymentMethods::REGULARDEDUCTION)`
+ 超商代碼 `$gomypay->payWith(PaymentMethods::SPMCODE)`
+ LinePay `$gomypay->payWith(PaymentMethods::LINEPAY)`

## License
Gomypay API PHP Client is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support ##
Contact: [ediasoft.com](ediasoft.com) — [info@ediasoft.com](mailto:info@ediasoft.com) — [+31 10 84 342 77](tel:+31108434277)