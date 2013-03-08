<?php
namespace CurrencyConverter\Rate;

use Doctrine\ORM\EntityRepository;

/**
 * 
 * @author Bora Tunca
 */
class Repository extends EntityRepository
{
    /**
     *
     * @param string $name
     * @param string $value
     */
    public function insertOrUpdate($name, $value)
    {
        $rate = $this->findOneByName($name);
        if (null === $rate) {
            $rate = new Entity();
            $rate->setName($name);
        }

        $rate->setValue($value);

        $this->getEntityManager()->persist($rate);
        $this->getEntityManager()->flush();
    }
}