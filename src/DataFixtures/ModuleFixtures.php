<?php

namespace App\DataFixtures;

use App\Entity\Module;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ModuleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $enseignant1 = $this->getReference('enseignant_1');
        $filiere1 = $this->getReference('filiere_1');
        $semestre1 = $this->getReference('semestre_1');

        $module1 = new Module();
        $module1->setNom('Algèbre Linéaire');
        $module1->setEnseignant($enseignant1);
        $module1->setFiliere($filiere1);
        $module1->setSemestre($semestre1);
        $manager->persist($module1);
        $this->addReference('module_1', $module1);

        $enseignant2 = $this->getReference('enseignant_2');
        $filiere2 = $this->getReference('filiere_2');
        $semestre2 = $this->getReference('semestre_2');

        $module2 = new Module();
        $module2->setNom('Physique Théorique');
        $module2->setEnseignant($enseignant2);
        $module2->setFiliere($filiere2);
        $module2->setSemestre($semestre2);
        $manager->persist($module2);
        $this->addReference('module_2', $module2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EnseignantFixtures::class,
            FiliereFixtures::class,
            SemestreFixtures::class,
        ];
    }
}
