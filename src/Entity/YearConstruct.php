<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class YearConstruct
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 * @ORM\Entity
 */
class YearConstruct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $yearStart;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $yearEnd;

    /**
     * @ORM\ManyToOne(targetEntity="CarModel", inversedBy="yearsConstruct")
     */
    private $model;

    /**
     * @ORM\OneToMany(targetEntity="Engine", mappedBy="yearConstruct")
     */
    private $engines;

    /**
     * Brand ToString
     */
    public function __toString()
    {
        if ($this->name) {
            return $this->name . ' - ' . $this->yearStart . ' -> ' . $this->yearEnd;
        }

        return $this->yearStart . ' -> ' . $this->yearEnd;
    }

    /**
     * YearConstruct Constructor
     */
    public function __construct()
    {
        $this->engines = new ArrayCollection();
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
     * @return YearConstruct
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return integer
     */
    public function getYearStart()
    {
        return $this->yearStart;
    }

    /**
     * @param integer $yearStart
     *
     * @return YearConstruct
     */
    public function setYearStart($yearStart)
    {
        $this->yearStart = $yearStart;

        return $this;
    }

    /**
     * @return integer
     */
    public function getYearEnd()
    {
        return $this->yearEnd;
    }

    /**
     * @param integer $yearEnd
     *
     * @return YearConstruct
     */
    public function setYearEnd($yearEnd)
    {
        $this->yearEnd= $yearEnd;

        return $this;
    }

    /**
     * @return CarModel
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param CarModel $model
     *
     * @return YearConstruct
     */
    public function setModel(CarModel $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return Engine[]
     */
    public function getEngines()
    {
        return $this->engines;
    }

    /**
     * @param Engine $engine
     *
     * @return YearConstruct
     */
    public function addEngine(Engine $engine)
    {
        $this->engines->add($engine);

        return $this;
    }

    /**
     * @param Engine $engine
     *
     * @return YearConstruct
     */
    public function removeEngine(Engine $engine)
    {
        $this->engines->removeElement($engine);

        return $this;
    }
}
