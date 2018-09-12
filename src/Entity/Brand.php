<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class Brand
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Brand
{
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
     * @ORM\OneToMany(targetEntity="CarModel", mappedBy="brand")
     */
    private $models;

    /**
     * @Vich\UploadableField(mapping="files", fileNameProperty="logoName")
     */
    private $logo;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $logoName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * Brand ToString
     */
    public function __toString()
    {
        return $this->name ?: '';
    }

    /**
     * Brand Consctructor
     */
    public function __construct()
    {
        $this->models = new ArrayCollection();
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
     * @return Brand
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return CarModel[]
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * @param CarModel $model
     *
     * @return Brand
     */
    public function addModel(CarModel $model)
    {
        $this->models->add($model);

        return $this;
    }

    /**
     * @param CarModel $model
     *
     * @return Brand
     */
    public function removeModel(CarModel $model)
    {
        $this->models->removeElement($model);

        return $this;
    }

    /**
     * @return File
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param File $logo
     *
     * @return Brand
     */
    public function setLogo(File $logo = null)
    {
        $this->logo = $logo;

        if ($logo) {
            $this->updatedAt = new \DateTime();
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getLogoName()
    {
        return $this->logoName;
    }

    /**
     * @param string $logoName
     *
     * return Brand
     */
    public function setLogoName(string $logoName = null)
    {
        $this->logoName = $logoName;

        return $this;
    }

    public function getPathLogo()
    {
        return '/upload/'.$this->logoName;
    }
}
