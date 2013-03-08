<?
namespace CurrencyConverter\Test\Fixture;

use CurrencyConverter\Rate\Entity as RateEntity;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

/**
 *
 * @author Bora Tunca
 */
class Rate implements FixtureInterface
{
    $rate = new RateEntity();
    $rate->setName('JPY');
    $rate->setValue(0.013);

    $manager->persist($rate);
    $manager->flush();
}
