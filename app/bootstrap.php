<?php
use Model\DoctrineHelper;

require_once __DIR__.'/../vendor/autoload.php';

$env = getenv('ENV');

$isDevMode = in_array($env, array('test', 'development'));
$dbname = $env === 'test' ? 'currency_converter_test' : 'currency_converter';
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'vagrant',
    'dbname'   => $dbname,
);

$doctrineHelper = new DoctrineHelper();
$doctrineHelper->setDbParams($dbParams);
$doctrineHelper->setPaths(array(__DIR__.'/../src/Model/Rate'));
$doctrineHelper->setDevMode($isDevMode);

$doctrineHelper->init();
