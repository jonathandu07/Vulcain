<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(
        private UserPasswordHasherInterface $hasher
    ){

    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $admin = new Admin();
        $admin->setPassword ($this -> hasher -> hashPassword ($admin, 'jonathandu07'))
        ->setname ('YHWH')
        ->setFirstname ('jonathan')
        ->setPhoneNumber ('0695382230')
        ->setEmail ('jonathan.yhwh@nac.fr')
        ->setRoles (['ROLE_ADMIN'])
        ->setPostalCode ('07240');
        $manager->persist($admin);
        $manager->flush();
    }
}
