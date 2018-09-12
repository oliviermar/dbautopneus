<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * class BodyWorkFolio
 *
 * @ORM\Entity(repositoryClass="App\Repository\BodyWorkFolioRepository")
 * @author Olivier Maréchal <o.marechal@icloud.com>
 */
class BodyWorkFolio
{
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
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="bodyWorkBefore", cascade={"persist"})
     */
    private $befores;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="bodyWorkAfter", cascade={"persist"})
     */
    private $afters;

    /**
     * BodyWorkFolio toString
     */
    public function __toString()
    {
        return $this->name ?: '';
    }

    /**
     * BoduWorkFolio constructor
     */
    public function __construct()
    {
        $this->befores = new ArrayCollection();
        $this->afters = new ArrayCollection();
    }

    /**
     * @return int
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
     * @return BodyWorkFolio
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return BodyWorkFolio
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param Image $image
     *
     * @return BodyWorkFolio
     */
    public function addBefore(Image $image)
    {
        if (!$this->befores->contains($image)) {
            $this->befores->add($image);
            $image->setBodyWorkBefore($this);
        }

        return $this;
    }

    /**
     * @param Image $image
     *
     * @return BodyWorkFolio
     */
    public function removeBefore(Image $image)
    {
        if ($this->befores->contains($image)) {
            $this->befores->remove($image);
            $image->setBodyWorkBefore(null);
        }

        return $this;
    }

    /**
     * @return ArrayCollection|Image[]
     */
    public function getBefores()
    {
        return $this->befores;
    }

    /**
     * @param Image $image
     *
     * @return BodyWorkFolio
     */
    public function addAfter(Image $image)
    {
        if (!$this->afters->contains($image)) {
            $this->afters->add($image);
            $image->setBodyWorkAfter($this);
        }

        return $this;
    }

    /**
     * @param Image $image
     *
     * @return BodyWorkFolio
     */
    public function removeAfter(Image $image)
    {
        if ($this->afters->contains($image)) {
            $this->afters->remove($image);
            $image->setBodyWorkAfter(null);
        }

        return $this;
    }

    /**
     * @return ArrayCollection|Image[]
     */
    public function getAfters()
    {
        return $this->afters;
    }
}
