<?php

namespace App\Entity;

use App\Repository\BadServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BadServiceRepository::class)]
class BadService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Admin $IdAdmin = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Services $IdService = null;

    #[ORM\Column(length: 255)]
    private ?string $Reason = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

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

    public function getIdService(): ?Services
    {
        return $this->IdService;
    }

    public function setIdService(Services $IdService): self
    {
        $this->IdService = $IdService;

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
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
