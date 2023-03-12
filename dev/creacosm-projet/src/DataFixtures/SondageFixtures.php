<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Sondage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SondageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = \Faker\Factory::create("fr_FR");
        $admin = new Admin();
        $admin->setPrenom("admin")->setLogin("admin")->setEntreprise("admin")->setMdp("admin")->setNom("admin");
        $manager->persist($admin);
        for($i=1; $i<=10; $i++) {

            $sondage = new Sondage();
            $sondage->setNom($faker->name)
                ->setVisbilite(True)
                ->setIntroduction($faker->sentence)
                ->setDateCreation(new \DateTime('now'))
            ->setCreateur($admin);

            $manager->persist($sondage);
        }
        $manager->flush();
    }
}
