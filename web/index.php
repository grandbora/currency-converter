<?php

use Controller\Index as IndexController;
use Model\Api;
use Model\DoctrineHelper;
use Buzz\Browser;
use Buzz\Client\Curl;

require_once __DIR__.'/../app/bootstrap.php';

$loader = new Twig_Loader_Filesystem(__DIR__.'/../src/View');
$twig = new Twig_Environment($loader);

$client = new Curl();
$browser = new Browser($client);
$rateRepository = DoctrineHelper::getRateRepository();
$api = new Api($rateRepository, $browser);

$controller = new IndexController($api, $twig);
$response = $controller->index();
$response->send();
