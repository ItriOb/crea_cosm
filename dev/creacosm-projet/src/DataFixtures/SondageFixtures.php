<?php

namespace App\DataFixtures;

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
        for($i=1; $i<=10; $i++) {

            $sondage = new Sondage();
            $sondage->setNom($faker->name)
                ->setVisbilite(True)
                ->setIntroduction($faker->sentence)
                ->setDateCreation(new \DateTime('now'));
            $manager->persist($sondage);
        }
        $manager->flush();
    }
}
