<?php

namespace App\Entity;

use App\Repository\GeographiqueZoneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeographiqueZoneRepository::class)]
class GeographiqueZone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    private ?string $pays = null;

    #[ORM\Column(length: 80)]
    private ?string $region = null;

    #[ORM\Column]
    private ?int $departement = null;

    #[ORM\Column]
    private ?int $codePostal = null;

    #[ORM\Column(length: 255)]
    private ?string $localite = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $IdUser = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Services $IdService = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Produits $IdProduit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getDepartement(): ?int
    {
        return $this->departement;
    }

    public function setDepartement(int $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getLocalite(): ?string
    {
        return $this->localite;
    }

    public function setLocalite(string $localite): self
    {
        $this->localite = $localite;

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
}
