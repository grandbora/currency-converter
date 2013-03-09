<?php
namespace Model\Test\Unit;

use Model\CurrencyConverter;

/**
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
        $this->api = $this->getMockBuilder('\Model\Api')
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

        $actual = $this->currencyConverter->convert('TEST_CURRENCY1', 550);
        $this->assertSame(7.5185, $actual);

        $actual = $this->currencyConverter->convert('TEST_CURRENCY2', 400);
        $this->assertSame(669.2, $actual);
    }

    /**
     *
     */
    public function testConvertByString()
    {
        $this->api->expects($this->at(0))
            ->method('getRate')
            ->with($this->equalTo('TEST_CURRENCY1'))
            ->will($this->returnValue(0.01367));
        $this->api->expects($this->at(1))
            ->method('getRate')
            ->with($this->equalTo('TEST_CURRENCY2'))
            ->will($this->returnValue(1.673));

        $actual = $this->currencyConverter->convertByString('TEST_CURRENCY1 550');
        $this->assertSame('USD 7.5185', $actual);

        $actual = $this->currencyConverter->convertByString('TEST_CURRENCY2 400');
        $this->assertSame('USD 669.2', $actual);
    }

    /**
     *
     */
    public function testConvertByArray()
    {
        $this->api->expects($this->at(0))
            ->method('getRate')
            ->with($this->equalTo('TEST_CURRENCY1'))
            ->will($this->returnValue(0.01367));
        $this->api->expects($this->at(1))
            ->method('getRate')
            ->with($this->equalTo('TEST_CURRENCY2'))
            ->will($this->returnValue(1.673));

        $actual = $this->currencyConverter->convertByArray(
            array('TEST_CURRENCY1 550','TEST_CURRENCY2 400'));
        $expected = array('USD 7.5185','USD 669.2');

        $this->assertSame($expected, $actual);
    }
}
