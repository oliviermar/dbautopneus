<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Rate
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 * @ORM\Entity
 */
class Rate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $note;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return integer
     */
    public function getNote(): ?int
    {
        return $this->note;
    }

    /**
     * @param int $note
     *
     * @return Rate
     */
    public function setNote(int $note): Rate
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     *
     * @return Rate
     */
    public function setComment(string $comment): Rate
    {
        $this->comment = $comment;

        return $this;
    }
}
