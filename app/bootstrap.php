<?php
use CurrencyConverter\DoctrineHelper;

require_once(__DIR__.'/../vendor/autoload.php');

$doctrineHelper = new DoctrineHelper();
$doctrineHelper->setDbParams(array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'vagrant',
    'dbname'   => 'currency_converter',
));
$doctrineHelper->setPaths(array(__DIR__.'/../src/CurrencyConverter/Rate'));
$doctrineHelper->setDevMode(true);

$doctrineHelper->init();