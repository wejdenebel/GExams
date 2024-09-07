<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CoursFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $classe1 = $this->getReference('classe_1');
        $classe2 = $this->getReference('classe_2');
        $enseignant1 = $this->getReference('enseignant_1');
        $enseignant2 = $this->getReference('enseignant_2');
        $matiere1 = $this->getReference('matiere_1');
        //$matiere2 = $this->getReference('matiere_2');

        $cours1 = new Cours();
        $cours1->setNom('Mathematiques Avancees');
        $cours1->setClasse($classe1);
        $cours1->setEnseignant($enseignant1);
        $cours1->setMatiere($matiere1);
        $cours1->setDateDebut(new \DateTime('2024-01-10'));
        $cours1->setDateFin(new \DateTime('2024-06-15'));
        $cours1->setCredits(5);
        $cours1->setCoefficient(2.0);
        $manager->persist($cours1);
        $this->addReference('cours_1', $cours1);

        $cours2 = new Cours();
        $cours2->setNom('Physique Quantique');
        $cours2->setClasse($classe2);
        $cours2->setEnseignant($enseignant2);
        $cours2->setMatiere($matiere1);
        $cours2->setDateDebut(new \DateTime('2024-02-01'));
        $cours2->setDateFin(new \DateTime('2024-07-01'));
        $cours2->setCredits(4);
        $cours2->setCoefficient(1.5);
        $manager->persist($cours2);
        $this->addReference('cours_2', $cours2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ClasseFixtures::class,
            EnseignantFixtures::class,
            MatiereFixtures::class,
        ];
    }
}
