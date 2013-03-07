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
    protected $browser;
    protected $api;

    /**
     *
     */
    protected function setUp()
    {
        $this->browser = $this->getMockBuilder('\Buzz\Browser')
                    ->disableOriginalConstructor()
                    ->getMock();

        $this->api = new Api($this->browser);
    }

    /**
     *
     */
    public function testGetRate()
    {
        $this->assertEquals(1.1, $this->api->getRate('JPY'));
        $this->assertEquals(1.2, $this->api->getRate('BGN'));
    }

    /**
     *
     */
    public function testRefreshRates()
    {
        $this->browser->expects($this->once())
            ->method('get')
            ->with($this->equalTo('http://toolserver.org/~kaldari/rates.xml'));

        $this->api->refreshRates();

        // $this->assertEquals(0.013, $this->api->getRate('JPY'));
        // $this->assertEquals(0.6, $this->api->getRate('BGN'));
    }
}
