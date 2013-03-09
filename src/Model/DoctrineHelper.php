<?php
namespace Model;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 *
 * @author Bora Tunca
 */
class DoctrineHelper
{
    private static $em;

    private $paths;
    private $isDevMode;
    private $dbParams;

    /**
     *
     * @param array $dbParams
     */
    public function setDbParams(array $dbParams)
    {
       $this->dbParams = $dbParams;
    }

    /**
     *
     * @param array $paths
     */
    public function setPaths(array $paths)
    {
       $this->paths = $paths;
    }

    /**
     *
     * @param boolean $isDevMode
     */
    public function setDevMode($isDevMode)
    {
       $this->isDevMode = $isDevMode;
    }

    /**
     *
     * @throws \InvalidArgumentException
     * @throws ORMException
     */
    public function init()
    {
        $config = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode);
        self::$em = EntityManager::create($this->dbParams, $config);
    }

    /**
     *
     * @return EntityManager
     */
    public static function getEntityManager()
    {
        return self::$em;
    }

    /**
     *
     * @return Model\Rate\Repository
     */
    public static function getRateRepository()
    {
        $em = self::getEntityManager();
        return $em->getRepository('Model\Rate\Entity');
    }
}
