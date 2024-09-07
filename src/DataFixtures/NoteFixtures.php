<?php

namespace App\DataFixtures;

use App\Entity\Note;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NoteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $etudiant1 = $this->getReference('etudiant_1');
        $module1 = $this->getReference('module_1');
        $matiere1 = $this->getReference('matiere_1');
        $cours1 = $this->getReference('cours_1');
        $semestre1 = $this->getReference('semestre_1');

        $note1 = new Note();
        $note1->setNote(15.5);
        $note1->setObservation('Bonne performance');
        $note1->setEtudiant($etudiant1);
        $note1->setModule($module1);
        $note1->setMatiere($matiere1);
        $note1->setCours($cours1);
        $note1->setSemestre($semestre1);

        $manager->persist($note1);
        $this->addReference('note_1', $note1);

        // Vous pouvez ajouter d'autres notes ici de manière similaire.

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EtudiantFixtures::class,
            ModuleFixtures::class,
            MatiereFixtures::class,
            CoursFixtures::class,
            SemestreFixtures::class,
        ];
    }
}
