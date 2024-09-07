<?php

namespace App\DataFixtures;

use App\Entity\Matiere;
use App\Entity\Semestre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MatiereFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $semestre = $this->getReference('semestre_1');

        $matiere1 = new Matiere();
        $matiere1->setNom('Matière 1');
        $matiere1->setSemestre($semestre);
        $manager->persist($matiere1);
        $this->addReference('matiere_1', $matiere1);

        // Add more matières as needed

        $manager->flush();
    }
    
    public function getDependencies(): array
    {
        return [
            SemestreFixtures::class,
        ];
    }
}
