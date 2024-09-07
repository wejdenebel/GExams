<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ClasseFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $enseignant1 = $this->getReference('enseignant_1');
        $enseignant2 = $this->getReference('enseignant_2');

        $classe1 = new Classe();
        $classe1->setNomClass('Classe A');
        $classe1->setEnseignant($enseignant1);
        $manager->persist($classe1);
        $this->addReference('classe_1', $classe1);

        $classe2 = new Classe();
        $classe2->setNomClass('Classe B');
        $classe2->setEnseignant($enseignant2);
        $manager->persist($classe2);
        $this->addReference('classe_2', $classe2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EnseignantFixtures::class,
        ];
    }
}
