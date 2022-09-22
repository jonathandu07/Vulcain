<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\Regex(
        pattern: '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD',
        message: 'Veuillez rentrer un email valide.'
    )]
    #[Assert\Length(
        max: 180,
        maxMessage: "email  trop long, longueur maximum {{ limit }} caractères",
    )]
    #[Assert\NotBlank()]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Assert\Regex(
        pattern: '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]).{8,32}$/',
        message: 'le mot de passe doit comporter au minimum un chiffre, un carractère minuscule,, majuscule et spécial'
    )]
    #[Assert\Length(
        min: 8,
        minMessage: "Mot de passe trop court minimum {{ limit }} caractères",
        max: 32,
        maxMessage: "Mot de passe trop long, longueur maximum {{ limit }} caractères",
    )]
    private ?string $password = null;

    #[ORM\Column(length: 40)]
    #[Assert\Length(
        min: 2,
        minMessage: "Nom d'utilisateur trop court minimum {{ limit }} caractères",
        max: 40,
        maxMessage: "Nom d'utilisateur trop long, longueur maximum {{ limit }} caractères",
    )]
    private ?string $User_Name = null;

    #[ORM\Column(length: 45)]
    #[Assert\Length(
        min: 2,
        minMessage: "Prénom d'utilisateur trop court minimum {{ limit }} caractères",
        max: 45,
        maxMessage: "Prénom d'utilisateur trop long, longueur maximum {{ limit }} caractères",
    )]
    private ?string $User_Firstname = null;


    // #[ORM\Column]
    // private ?string $User_PhoneNumber = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 18,
        max: 120,
        notInRangeMessage: "Age minimum {{ limit }} ans",
    )]
    #[Assert\NotBlank()]
    private ?int $User_Age = null;


    #[ORM\Column(length: 255)]
    private ?string $User_Pseudo = null;

    #[ORM\Column(length: 12, unique: true)]
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
        $this->User_phone_number = $User_phone_number;

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
