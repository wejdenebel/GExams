<?php

namespace App\DataFixtures;

use App\Entity\Semestre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class SemestreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $semestre1 = new Semestre();
        $semestre1->setNom('Semestre 1');
        $manager->persist($semestre1);
        $this->addReference('semestre_1', $semestre1);

        $semestre2 = new Semestre();
        $semestre2->setNom('Semestre 2');
        $manager->persist($semestre2);
        $this->addReference('semestre_2', $semestre2);

        $manager->flush();
    }
}
