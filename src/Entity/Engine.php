<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Engine
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 * @ORM\Entity
 */
class Engine
{
    const TYPE_FUEL_GASOLINE = 'Essence';
    const TYPE_FUEL_DIESEL = 'Diesel';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $originPower;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $expectedPower;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="YearConstruct", inversedBy="engines")
     */
    private $yearConstruct;

    /**
     * @ORM\Column(type="string")
     */
    private $typeFuel;

    /**
     * @return integer
     */
    public function getGain()
    {
        return ($this->expectedPower - $this->originPower);
    }

    /**
     * Engine ToString
     */
    public function __toString()
    {
        return $this->name . ' ' . $this->originPower;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Engine
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOriginPower()
    {
        return $this->originPower;
    }

    /**
     * @param integer $originPower
     *
     * @return Engine
     */
    public function setOriginPower($originPower)
    {
        $this->originPower = $originPower;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExpectedPower()
    {
        return $this->expectedPower;
    }

    /**
     * @param integer $expectedPower
     *
     * @return Engine
     */
    public function setExpectedPower($expectedPower)
    {
        $this->expectedPower = $expectedPower;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param integer $price
     *
     * @return Engine
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return YearConstruct
     */
    public function getYearConstruct()
    {
        return $this->yearConstruct;
    }

    /**
     * @param YearConstruct $yearConstruct
     *
     * @return Engine
     */
    public function setYearConstruct(YearConstruct $yearConstruct)
    {
        $this->yearConstruct = $yearConstruct;

        return $this;
    }

    /**
     * @return string
     */
    public function getTypeFuel()
    {
        return $this->typeFuel;
    }

    /**
     * @param string $typeFuel
     *
     * @return Engine
     */
    public function setTypeFuel($typeFuel)
    {
        $this->typeFuel = $typeFuel;

        return $this;
    }
}

