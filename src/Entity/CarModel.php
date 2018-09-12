<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class CarModel
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 * @ORM\Entity
 */
class CarModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="models")
     */
    private $brand;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="YearConstruct", mappedBy="model")
     */
    private $yearsConstruct;

    /**
     * CarModel constructor
     */
    public function __construct()
    {
        $this->yearsConstruct = new ArrayCollection();
    }

    /**
     * CarModels ToString
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
     * @return Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     *
     * @return CarModel
     */
    public function setBrand(Brand $brand)
    {
        $this->brand = $brand;

        return $this;
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
     * @return CarModel
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return YearConstruct[]
     */
    public function getYearsConstruct()
    {
        return $this->yearsConstruct;
    }

    /**
     * @param YearConstruct $yearConstruct
     *
     * @return CarModel
     */
    public function addYearConstruct(YearConstruct $yearConstruct)
    {
        $this->yearsConstruct->add($yearConstruct);

        return $this;
    }

    /**
     * @param YearConstruct $yearConstruct
     *
     * @return CarModel
     */
    public function removeYearConstruct(YearConstruct $yearConstruct)
    {
        $this->yearsConstruct->removeElement($yearConstruct);

        return $this;
    }
}
