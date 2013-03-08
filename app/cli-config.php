<?php
use CurrencyConverter\DoctrineHelper;

require_once "bootstrap.php";

$em = DoctrineHelper::getEntityManager();

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));
