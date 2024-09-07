<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EtudiantFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $classe1 = $this->getReference('classe_1');
        $classe2 = $this->getReference('classe_2');

        $etudiant1 = new Etudiant();
        $etudiant1->setNom('Alice');
        $etudiant1->setPrenom('Martin');
        $etudiant1->setEmail('alice.martin@example.com');
        $etudiant1->setMatriculeET('S123');
        $etudiant1->setClasse($classe1);
        $etudiant1->setEstAdmin(false);
        $manager->persist($etudiant1);
        $this->addReference('etudiant_1', $etudiant1);

        $etudiant2 = new Etudiant();
        $etudiant2->setNom('Bob');
        $etudiant2->setPrenom('Dupont');
        $etudiant2->setEmail('bob.dupont@example.com');
        $etudiant2->setMatriculeET('S124');
        $etudiant2->setClasse($classe2);
        $etudiant2->setEstAdmin(true);
        $manager->persist($etudiant2);
        $this->addReference('etudiant_2', $etudiant2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ClasseFixtures::class,
        ];
    }
}
