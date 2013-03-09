<?php

use Controller\Index as IndexController;
use CurrencyConverter\CurrencyConverter;
use CurrencyConverter\Api;
use CurrencyConverter\DoctrineHelper;
use Buzz\Browser;
use Buzz\Client\Curl;

require_once __DIR__.'/../app/bootstrap.php';

$client = new Curl();
$browser = new Browser($client);

$rateRepository = DoctrineHelper::getRateRepository();

$api = new Api($rateRepository, $browser);
$currencyConverter = new CurrencyConverter($api);

$controller = new IndexController($currencyConverter);
$response = $controller->index();
$response->send();
