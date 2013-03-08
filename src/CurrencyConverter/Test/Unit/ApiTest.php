<?php
namespace CurrencyConverter\Unit\Test;

use CurrencyConverter\Api;

/**
 * CurrencyConverter Tests
 *
 * @author Bora Tunca
 */
class ApiTest extends \PHPUnit_Framework_TestCase
{
    protected $rateRepository;
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
        $this->rateRepository = $this->getMockBuilder('\CurrencyConverter\Rate\Repository')
                    ->disableOriginalConstructor()
                    ->getMock();

        $this->api = new Api($this->rateRepository, $this->browser);
    }

    /**
     *
     */
    public function testConvert()
    {
     

        $this->api->convertToUS('JPY', 5000);
    }
}
