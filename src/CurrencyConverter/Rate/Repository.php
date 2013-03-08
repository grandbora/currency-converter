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
     */
    public function deleteAll()
    {
        $query = $this->createQueryBuilder('r')->delete()->getQuery();
        $query->getResult();
    }
}