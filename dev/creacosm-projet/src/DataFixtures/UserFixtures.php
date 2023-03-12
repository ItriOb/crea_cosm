<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private UserPasswordHasherInterface $passwordHasher;


    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {

       $user = new Utilisateur();
        $user->setPassword($this->passwordHasher->hashPassword($user, "admin"))
            ->setLogin("admin")
            ->setVille("Orleans")
            ->setName("Admin")
            ->setPrenom("Admin")
            ->setProfession("Admin")
            ->setGenre("M")
            ->setAge(20);
        $manager->persist($user);
        $manager->flush();
    }
}
