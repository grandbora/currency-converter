<?php
use Model\Api;
use Model\DoctrineHelper;
use Buzz\Browser;
use Buzz\Client\Curl;

require_once 'bootstrap.php';

$client = new Curl();
$browser = new Browser($client);

$rateRepository = DoctrineHelper::getRateRepository();

$api = new Api($rateRepository, $browser);
$api->refreshRates();