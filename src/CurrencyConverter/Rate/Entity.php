<?php
namespace CurrencyConverter\Rate;

/**
 * @Entity(repositoryClass="CurrencyConverter\Rate\Repository")
 * @Table(name="exchange_rates",
 *      uniqueConstraints={@UniqueConstraint(name="name_unique",columns={"name"})},
 *      indexes={@Index(name="name_idx", columns={"name"})})
 * 
 * @author Bora Tunca
 */
class Entity
{
    /** 
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /** 
     * @Column(type="string", length=15, nullable=false)
     */
    private $name;

    /** 
     * @Column(type="float", nullable=false)
     */
    private $value;

    /**
     *
     * @return integer
     */
    public function getId()
    {
       return $this->id;
    }

    /**
     *
     * @param string $name
     */
    public function setName($name)
    {
       $this->name = $name;
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
       return $this->name;
    }

    /**
     *
     * @param mixed $value
     */
    public function setValue($value)
    {
       $this->value = (double)$value;
    }

    /**
     *
     * @return string
     */
    public function getValue()
    {
       return $this->value;
    }
}
