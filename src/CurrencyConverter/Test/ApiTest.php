<?php
namespace CurrencyConverter\Test;

use CurrencyConverter\Api;

/**
 * CurrencyConverter Tests
 *
 * @author Bora Tunca
 */
class ApiTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testRefreshRates()
    {
        $api = new Api();
        $api->refreshRates();

        $this->assertEquals('1001', $api->getRate('JPY'));
    }
}
