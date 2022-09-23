<?php

namespace App\Entity;

use App\Repository\BadProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BadProduitRepository::class)]
class BadProduit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Admin $IdAdmin = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produits $IdProduit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAdmin(): ?Admin
    {
        return $this->IdAdmin;
    }

    public function setIdAdmin(Admin $IdAdmin): self
    {
        $this->IdAdmin = $IdAdmin;

        return $this;
    }

    public function getIdProduit(): ?Produits
    {
        return $this->IdProduit;
    }

    public function setIdProduit(Produits $IdProduit): self
    {
        $this->IdProduit = $IdProduit;

        return $this;
    }
}
