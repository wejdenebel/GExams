<?php

namespace App\DataFixtures;

use App\Entity\EmploisDuTemps;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EmploisDuTempsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $enseignant1 = $this->getReference('enseignant_1');
        $etudiant1 = $this->getReference('etudiant_1');
        $matiere1 = $this->getReference('matiere_1');
        $classe1 = $this->getReference('classe_1');
        $semestre1 = $this->getReference('semestre_1');

        $emploi1 = new EmploisDuTemps();
        $emploi1->setEnseignant($enseignant1);
        $emploi1->setEtudiant($etudiant1);
        $emploi1->setMatiere($matiere1);
        $emploi1->setClasse($classe1);
        $emploi1->setDebut(new \DateTime('2024-09-01 08:00:00'));
        $emploi1->setFin(new \DateTime('2024-09-01 10:00:00'));
        $emploi1->setSemestre($semestre1);
        $manager->persist($emploi1);
        $this->addReference('emploi_1', $emploi1);

        // Vous pouvez ajouter d'autres emplois du temps ici de manière similaire.

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EnseignantFixtures::class,
            EtudiantFixtures::class,
            MatiereFixtures::class,
            ClasseFixtures::class,
            SemestreFixtures::class,
        ];
    }
}
