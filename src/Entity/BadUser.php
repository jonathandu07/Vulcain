<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Admin;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BadUserRepository;

#[ORM\Entity(repositoryClass: BadUserRepository::class)]
class BadUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Admin $IdAdmin = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $IdUser = null;

    #[ORM\Column(length: 255)]
    private ?string $Reason = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAdmin(): ?Admin
    {
        return $this->IdAdmin;
    }

    public function setIdAdmin(?Admin $IdAdmin): self
    {
        $this->IdAdmin = $IdAdmin;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->IdUser;
    }

    public function setIdUser(?User $IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->Reason;
    }

    public function setReason(string $Reason): self
    {
        $this->Reason = $Reason;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }
}
