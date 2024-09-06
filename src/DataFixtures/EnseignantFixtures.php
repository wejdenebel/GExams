<?php

namespace App\DataFixtures;

use App\Entity\Enseignant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EnseignantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $enseignant1 = new Enseignant();
        $enseignant1->setNom('John');
        $enseignant1->setPrenom('Doe');
        $enseignant1->setEmail('john.doe@example.com');
        $enseignant1->setMatriculeEN('E123');
        $manager->persist($enseignant1);
        $this->addReference('enseignant_1', $enseignant1);

        $enseignant2 = new Enseignant();
        $enseignant2->setNom('Jane');
        $enseignant2->setPrenom('Smith');
        $enseignant2->setEmail('jane.smith@example.com');
        $enseignant2->setMatriculeEN('E124');
        $manager->persist($enseignant2);
        $this->addReference('enseignant_2', $enseignant2);

        $manager->flush();
    }
}
