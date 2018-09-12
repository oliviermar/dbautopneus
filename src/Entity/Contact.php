<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Contact
 *
 * @author Olivier Maréchal <o.marechal@icloud.com>
 * @ORM\Entity()
 */
class Contact
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotNull(
     *     message = "Veuillez renseigner ce champ"
     * )
     * @Assert\Email(
     *     message = "l'email '{{ value }}' n'est pas valide.",
     *     checkMX = true
     * )
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\NotNull(
     *     message = "Veuillez renseigner ce champ"
     * )
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $phone;

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail(string $email): Contact
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Contact
     */
    public function setName(string $name): Contact
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return Contact
     */
    public function setContent(string $content): Contact
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return Contact
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;

        return $this;
    }
}
