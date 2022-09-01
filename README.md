# Package laravel-msegat
This is a Laravel package for msegat. Its goal is to remove the complexity


## Package Laravel Msegat 
![Unit Tests](https://github.com/barryvdh/laravel-debugbar/workflows/Unit%20Tests/badge.svg)
[![Packagist License](https://poser.pugx.org/barryvdh/laravel-debugbar/license.png)](http://choosealicense.com/licenses/mit/)
[![Latest Stable Version](https://poser.pugx.org/barryvdh/laravel-debugbar/version.png)](https://packagist.org/packages/moemengaballah/msegat)
[![Total Downloads](https://poser.pugx.org/barryvdh/laravel-debugbar/d/total.png)](https://packagist.org/packages/moemengaballah/msegat)

This is a package for [msegat](https://msegat.docs.apiary.io/).
Its goal is to remove the complexity.


## Installation


```shell
composer require moemengaballah/msegat
```

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

### Laravel version less than 5.5:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
MoemenGaballah\Msegat\MsegatServiceProvider::class,
```

If you want to use the facade to log messages, add this to your facades in app.php:

```php
'Msegat' => MoemenGaballah\Msegat\Msegat::class,
```

#### Copy the package config to your local config with the publish command:

```shell
php artisan vendor:publish --provider="msegat"
```

## Usage

You must add first API Credentials in file env

```php
MSEGAT_USERNAME=
MSEGAT_USER_SENDER=
MSEGAT_API_KEY=
```

## Example OTP

```php
// numbers (required, string, international format without zeros separated by comma, example: "966xxxxxxxxx" or "966xxxxxxxxx,966xxxxxxxxx,966xxxxxxxxx")
//Msegat::sendMessage('numbers', 'MSG'); 
use Msegat;

$msg = Msegat::sendMessage('966xxxxxxxxx', 'رمز التحقق: 1234');

dd($msg);

```

```php
// another example 
Route::get('/', function () {
    $msg = Msegat::sendMessage('966xxxxxxxxx', 'رمز التحقق: 1234');
    dd($msg);
});

```


## if you don't have Credentials


```php


This API is based on HTTPS protocol

You must have an account to test this API, to register please click here

You must use HTTPS POST with parameters in body [ VERY IMPORTANT ]

You must use URL ENCODING when you send the variables

If SMS is English only, we will charge 1 point for each 160 chars and if you send more than this, we will charge 1 point for each 153 chars

If SMS contains language other than English, we will charge 1 point for each 70 chars and if you send more than this, we will charge 1 point for each 67 chars

You can test our API for free . You will get free sms every day . To test our service you can send sms using below parameters:

userSender: OTP
msg: "Pin Code is: xxxx" or "Verification Code: xxxx"
```



## status code and Messages


```php

1 - Success

M0000 - Success

M0001 - Variables missing

M0002 - Invalid login info

M0022 - Exceed number of senders allowed

M0023 - Sender Name is active or under activation or refused

M0024 - Sender Name should be in English or number

M0025 - Invalid Sender Name Length

M0026 - Sender Name is already activated or not found

M0027 - Activation Code is not Correct

1010 - Variables missing

1020 - Invalid login info

1050 - MSG body is empty

1060 - Balance is not enough

1061 - MSG duplicated

1064 - Free OTP , Invalid MSG content you should use "Pin Code is: xxxx" or "Verification Code: xxxx" or "رمز التحقق: 1234" , or upgrade your account and activate your sender to send any content

1110 - Sender name is missing or incorrect

1120 - Mobile numbers is not correct

1140 - MSG length is too long

M0029 - Invalid Sender Name - Sender Name should contain only letters, numbers and the maximum length should be 11 characters

M0030 - Sender Name should ended with AD

M0031 - Maximum allowed size of uploaded file is 5 MB

M0032 - Only pdf,png,jpg and jpeg files are allowed!

M0033 - Sender Type should be normal or whitelist only

M0034 - Please Use POST Method

M0036 - There is no any sender
```



