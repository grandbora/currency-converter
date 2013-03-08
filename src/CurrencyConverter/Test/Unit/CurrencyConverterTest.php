<?php
namespace CurrencyConverter\Test\Unit;

use CurrencyConverter\CurrencyConverter;

/**
 * CurrencyConverter Tests
 *
 * @author Bora Tunca
 */
class CurrencyConverterTest extends \PHPUnit_Framework_TestCase
{
    private $api;
    private $currencyConverter;

    /**
     *
     */
    protected function setUp()
    {
        $this->api = $this->getMockBuilder('\CurrencyConverter\Api')
                    ->disableOriginalConstructor()
                    ->getMock();

        $this->currencyConverter = new CurrencyConverter($this->api);
    }

    /**
     *
     */
    public function testConvert()
    {
        $this->api->expects($this->at(0))
            ->method('getRate')
            ->with($this->equalTo('TEST_CURRENCY1'))
            ->will($this->returnValue(0.01367));
        $this->api->expects($this->at(1))
            ->method('getRate')
            ->with($this->equalTo('TEST_CURRENCY2'))
            ->will($this->returnValue(1.673));

        $actual = $this->currencyConverter->convertToUSCurrency('TEST_CURRENCY1', 550);
        $this->assertSame(7.5185, $actual);

        $actual = $this->currencyConverter->convertToUSCurrency('TEST_CURRENCY2', 400);
        $this->assertSame(669.2, $actual);
    }
}
