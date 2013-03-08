<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__.'/CurrencyConverter/Rate');
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'vagrant',
    'dbname'   => 'currency_converter',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$em = EntityManager::create($dbParams, $config);
