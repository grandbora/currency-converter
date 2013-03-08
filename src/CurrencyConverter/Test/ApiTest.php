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
        $this->assertEquals(0.013, $this->api->getRate('JPY'));
        $this->assertEquals(0.6, $this->api->getRate('BGN'));
        $this->assertEquals(1.05, $this->api->getRate('CZK'));
    }

    /**
     *
     */
    public function testRefreshRates()
    {

        $mockedXMLResponse = file_get_contents(__DIR__.'/fixture/api-response-mock.xml');

        $buzzResponse = $this->getMockBuilder('\Buzz\Message\Response')
                    ->disableOriginalConstructor()
                    ->getMock();

        $buzzResponse->expects($this->once())
            ->method('getContent')
            ->will($this->returnValue($mockedXMLResponse));

        $this->browser->expects($this->once())
            ->method('get')
            ->with($this->equalTo('http://toolserver.org/~kaldari/rates.xml'))
            ->will($this->returnValue($buzzResponse));


        $this->api->refreshRates();

        // $this->assertEquals(0.013, $this->api->getRate('JPY'));
        // $this->assertEquals(0.6, $this->api->getRate('BGN'));
    }
}
