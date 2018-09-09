<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Class Option
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 * @ORM\Entity(repositoryClass="App\Repository\OptionRepository")
 * @ORM\Table(name="option_car")
 */
class Option
{
    const DIESEL_AVAILABLE = 'Diesel';
    const GASOLINE_AVAILABLE = 'Essence';
    const ALL_AVAILABLE = 'Tout véhicule';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string")
     */
    private $fuelAvailable;

    /**
     * @ORM\OneToMany(targetEntity="Promotion", mappedBy="option")
     */
    private $promotions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promotions = new ArrayCollection();
    }

    /**
     * @return PromotionAvailable[]
     */
    public function getCUrrentlyPromotions()
    {
        $promotionsAvailables = [];
        foreach ($this->promotions as $promotion) {
            if ($promotion->isAvailable()) {
                $promotionsAvailables[] = $promotion;
            }
        }

        return $promotionsAvailables;
    }

    /**
     * toString Option
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name ?: '';
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
     * @return Option
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Option
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return Option
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getFuelAvailable()
    {
        return $this->fuelAvailable;
    }

    /**
     * @param string $fuelAvailable
     *
     * @return string
     */
    public function setFuelAvailable($fuelAvailable)
    {
        $this->fuelAvailable = $fuelAvailable;

        return $this;
    }
}
