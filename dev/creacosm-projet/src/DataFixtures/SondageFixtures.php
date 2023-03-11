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

        $sondage = new Sondage();
        $sondage->setNom("Sondage 1")
            ->setVisbilite(True)
            ->setIntroduction("Wesh bien ")
            ->setDateCreation(new \DateTime('now'));
        $manager->persist($sondage);
        $manager->flush();
    }
}
