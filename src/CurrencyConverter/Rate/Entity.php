<?php
namespace CurrencyConverter\Rate\Entity;

/**
 * @Entity
 * 
 */
class Rate
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
     * @Column(type="integer", nullable=false)
     */
    private $value;
}