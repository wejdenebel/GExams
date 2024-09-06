<?php

namespace App\DataFixtures;

use App\Entity\AnneeAcademique;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnneeAcademiqueFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $anneeAcademique1 = new AnneeAcademique();
        $anneeAcademique1->setAnnee('2023-2024');
        $manager->persist($anneeAcademique1);
        $this->addReference('annee_academique_1', $anneeAcademique1);

        $anneeAcademique2 = new AnneeAcademique();
        $anneeAcademique2->setAnnee('2024-2025');
        $manager->persist($anneeAcademique2);
        $this->addReference('annee_academique_2', $anneeAcademique2);

        $manager->flush();
    }
}
