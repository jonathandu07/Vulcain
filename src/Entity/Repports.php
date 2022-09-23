<?php

namespace App\Entity;

use App\Repository\RepportsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepportsRepository::class)]
class Repports
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $IdUser = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Services $IdService = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Produits $IdProduit = null;

    #[ORM\Column(length: 255)]
    private ?string $rapport = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?user
    {
        return $this->IdUser;
    }

    public function setIdUser(user $IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    public function getIdService(): ?Services
    {
        return $this->IdService;
    }

    public function setIdService(?Services $IdService): self
    {
        $this->IdService = $IdService;

        return $this;
    }

    public function getIdProduit(): ?Produits
    {
        return $this->IdProduit;
    }

    public function setIdProduit(?Produits $IdProduit): self
    {
        $this->IdProduit = $IdProduit;

        return $this;
    }

    public function getRapport(): ?string
    {
        return $this->rapport;
    }

    public function setRapport(string $rapport): self
    {
        $this->rapport = $rapport;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
