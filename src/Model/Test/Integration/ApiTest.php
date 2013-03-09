<?php
namespace Model\Test\Integration;

use Model\Api;
use Model\DoctrineHelper;
use Model\Test\Integration\Fixture\Rate as RateData;
use Doctrine\Common\DataFixtures\Loader as FixtureLoader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;


/**
 *
 * @author Bora Tunca
 */
class ApiTest extends \PHPUnit_Framework_TestCase
{
    protected $executor;
    protected $loader;
    protected $browser;
    protected $api;

    /**
     *
     */
    protected function setUp()
    {
        $this->executor = new ORMExecutor(DoctrineHelper::getEntityManager(), new ORMPurger());

        $this->loader = new FixtureLoader();
        $this->loader->addFixture(new RateData);

        $this->browser = $this->getMockBuilder('\Buzz\Browser')
            ->disableOriginalConstructor()
            ->getMock();
        $rateRepository = DoctrineHelper::getRateRepository();
        $this->api = new Api($rateRepository, $this->browser);

    }

    /**
     *
     */
    public function testGetRate()
    {
        $fixtures = $this->loader->getFixtures();
        $this->executor->execute($fixtures);

        $this->assertEquals(0.013, $this->api->getRate('JPY'));
        $this->assertEquals(0.6, $this->api->getRate('BGN'));
        $this->assertEquals(1.05, $this->api->getRate('CZK'));
    }

    /**
     *
     * @expectedException InvalidArgumentException
     */
    public function testGetNonExistingRate()
    {
        $fixtures = $this->loader->getFixtures();
        $this->executor->execute($fixtures);

        $this->api->getRate('NONEEXISTING');
    }

    /**
     *
     */
    public function testRefreshRates()
    {
        $fixtures = $this->loader->getFixtures();
        $this->executor->execute($fixtures);

        $mockedXMLResponse = file_get_contents(__DIR__.'/Fixture/xml/api-response-mock.xml');

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
        $this->assertEquals(1.013, $this->api->getRate('JPY'));
        $this->assertEquals(2.6, $this->api->getRate('BGN'));
        $this->assertEquals(3.05, $this->api->getRate('CZK'));
        $this->assertEquals(40.04, $this->api->getRate('CHF'));
    }
}
