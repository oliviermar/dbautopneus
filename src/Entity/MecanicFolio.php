<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class MecanicFolio
 *
 * @ORM\Entity(repositoryClass="App\Repository\MecanicFolioRepository")
 * @author Olivier Maréchal <o.marechal@icloud.com>
 */
class MecanicFolio
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
     * @ORM\OneToMany(targetEntity="Image", mappedBy="mecanic", cascade={"persist"})
     */
    private $images;

    /**
     * MecanicFolio constructor
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
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
     * @return MecanicFolio
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
     * @return MecanicFolio
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param Image $image
     *
     * @return MecanicFolio
     */
    public function addImage(Image $image)
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setMecanic($this);
        }

        return $this;
    }

    /**
     * @param Image $image
     *
     * @return MecanicFolio
     */
    public function removeImage(Image $image)
    {
        if ($this->images->contains($image)) {
            $this->images->remove($image);
            $image->setMecanic(null);
        }

        return $this;
    }

    /**
     * @return ArrayCollection|Image[]
     */
    public function getImages()
    {
        return $this->images;
    }
}
