<?php
use Buzz\Browser;
use Buzz\Client\Curl;
use CurrencyConverter\Api;

require_once('bootstrap.php');

$client = new Curl();
$browser = new Browser($client);
$api = new Api($browser);

$api->refreshRates();