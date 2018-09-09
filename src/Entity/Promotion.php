<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * class Promotion
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 * @ORM\Entity
 */
class Promotion
{
    const TYPE_PERCENT = 'Reduction en %';
    const TYPE_AMOUNT = 'Reduction d\'un montant';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateStart;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $dateEnd;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity="Option", inversedBy="promotions")
     */
    private $option;

    /**
     * @ORM\Column(type="boolean")
     */
    private $reprogrammation;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title ?? '';
    }

    /**
     * @return bool
     */
    public function isAvailable()
    {
        $now = new \DateTime();
        $weekPast = (new \DateTime())->sub(new \DateInterval('P7D'));

        if ($this->dateStart > $weekPast && $this->dateEnd > $now) {
            return true;
        }

        return false;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * @param DateTime $dateStart
     *
     * @return Promotion
     */
    public function setDateStart(\DateTime $dateStart = null)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * @param DateTime $dateEnd
     *
     * @return Promotion
     */
    public function setDateEnd(\DateTime $dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Promotion
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Promotion
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Option|null
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param Option $option
     *
     * @return Promotion
     */
    public function setOption(Option $option)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * @return bool
     */
    public function isReprogrammation()
    {
        return $this->reprogrammation;
    }

    /**
     * @param bool $reprogramation
     *
     * @return Promotion
     */
    public function setReprogrammation($reprogrammation)
    {
        $this->reprogrammation = $reprogrammation;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return Promotion
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }
}
