<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $User_Name = null;

    #[ORM\Column(length: 45)]
    private ?string $User_Firstname = null;

    // #[ORM\Column]
    // private ?string $User_PhoneNumber = null;

    #[ORM\Column]
    private ?int $User_Age = null;

    #[ORM\Column(length: 255)]
    private ?string $User_Pseudo = null;

    #[ORM\Column(length: 12)]
    private ?string $User_phone_number = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserName(): ?string
    {
        return $this->User_Name;
    }

    public function setUserName(string $User_Name): self
    {
        $this->User_Name = $User_Name;

        return $this;
    }

    public function getUserFirstname(): ?string
    {
        return $this->User_Firstname;
    }

    public function setUserFirstname(string $User_Firstname): self
    {
        $this->User_Firstname = $User_Firstname;

        return $this;
    }

    public function getUserPhoneNumber(): ?int
    {
        return $this->User_phone_number;
    }

    public function setUserPhoneNumber(int $User_phone_number): self
    {
        $this->User_PhoneUser_phone_numberNumber = $User_phone_number;

        return $this;
    }

    public function getUserAge(): ?int
    {
        return $this->User_Age;
    }

    public function setUserAge(int $User_Age): self
    {
        $this->User_Age = $User_Age;

        return $this;
    }

    public function getUserPseudo(): ?string
    {
        return $this->User_Pseudo;
    }

    public function setUserPseudo(string $User_Pseudo): self
    {
        $this->User_Pseudo = $User_Pseudo;

        return $this;
    }
}
