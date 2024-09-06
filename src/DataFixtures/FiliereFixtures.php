<?php

namespace App\DataFixtures;

use App\Entity\Filiere;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FiliereFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $filiere1 = new Filiere();
        $filiere1->setNom('Informatique');
        $manager->persist($filiere1);
        $this->addReference('filiere_1', $filiere1);

        $filiere2 = new Filiere();
        $filiere2->setNom('Mathématiques');
        $manager->persist($filiere2);
        $this->addReference('filiere_2', $filiere2);

        $manager->flush();
    }
}
