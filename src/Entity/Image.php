<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class Image
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 *
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Image
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
    private $filename;

    /**
     * @Vich\UploadableField(mapping="files", fileNameProperty="filename")
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="BodyWorkFolio", inversedBy="afters")
     */
    private $bodyWorkAfter;

    /**
     * @ORM\ManyToOne(targetEntity="BodyWorkFolio", inversedBy="befores")
     */
    private $bodyWorkBefore;

    /**
     * @ORM\ManyToOne(targetEntity="MecanicFolio", inversedBy="images")
     */
    private $mecanic;

    /**
     * Image Constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * Image ToString
     */
    public function __toString()
    {
        return $this->filename ?: '';
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $filename
     *
     * @return Image
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param File $image
     *
     * @return Image
     */
    public function setImage(File $image)
    {
        $this->image = $image;

        if ($image) {
            $this->updatedAt = new \DateTime();
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return Image
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     *
     * @return Image
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getPathImage()
    {
        return '/upload/'.$this->filename;
    }

    /**
     * @return BodyWorkFolio
     */
    public function getBodyWorkBefore()
    {
        return $this->bodyWorkBefore;
    }

    /**
     * @param BodyWorkFolio $before
     *
     * @return Image
     */
    public function setBodyWorkBefore(BodyWorkFolio $before = null)
    {
        $this->bodyWorkBefore = $before;

        return $this;
    }

    /**
     * @return BodyWorkFolio
     */
    public function getBodyWorkAfter()
    {
        return $this->bodyWorkAfter;
    }

    /**
     * @param BodyWorkFolio $after
     *
     * @return Image
     */
    public function setBodyWorkAfter(BodyWorkFolio $after = null)
    {
        $this->bodyWorkAfter = $after;

        return $this;
    }

    /**
     * @return MecanicFolio
     */
    public function getMecanic()
    {
        return $this->mecanic;
    }

    /**
     * @param Mecanic $mecanic
     *
     * @return Image
     */
    public function setMecanic(MecanicFolio $mecanic = null)
    {
        $this->mecanic = $mecanic;

        return $this;
    }
}
