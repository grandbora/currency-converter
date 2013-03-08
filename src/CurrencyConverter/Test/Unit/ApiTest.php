<?php
namespace CurrencyConverter\Unit\Test;

use CurrencyConverter\Api;
use CurrencyConverter\Rate\Entity as RateEntity;

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
        // $rateEntity = new RateEntity();
        // $rateEntity->setValue(0.0134);

        // $this->rateRepository->expects($this->once())
        //     ->method('findOneByName')
        //     ->with($this->equalTo('currName'))
        //     ->will($this->returnValue($rateEntity));

        // $this->assertSame(7.37, $this->api->convertToUS('JPY', 550));
    }
}
