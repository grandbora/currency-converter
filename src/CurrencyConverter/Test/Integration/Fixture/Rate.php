<?
namespace CurrencyConverter\Test\Integration\Fixture;

use CurrencyConverter\Rate\Entity as RateEntity;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

/**
 *
 * @author Bora Tunca
 */
class Rate implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $rate = new RateEntity();
        $rate->setName('JPY');
        $rate->setValue(0.013);
        $manager->persist($rate);

        $rate = new RateEntity();
        $rate->setName('BGN');
        $rate->setValue(0.6);
        $manager->persist($rate);

        $rate = new RateEntity();
        $rate->setName('CZK');
        $rate->setValue(1.05);
        $manager->persist($rate);

        $manager->flush();
    }
}
