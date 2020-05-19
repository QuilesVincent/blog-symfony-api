<?php

namespace App\Application\Entity;

use App\Application\Repository\TokenApiRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Application\Repository\TokenApiRepository")
 */
class TokenApi
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @var string
     * @ORM\Column
     * @Assert\NotBlank
     */
    private string $value;

    /**
     * @var \DateTimeImmutable
     * @ORM\Column(type="datetime_immutable")
     * @Assert\NotBlank
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @var UserInterface
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tokenApi")
     */
    private UserInterface $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }



    public function setCreatedAt(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     */
    public function setUser(UserInterface $user): void
    {
        $this->user = $user;
    }



}
