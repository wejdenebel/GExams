<?php

namespace App\Controller\Admin;

use App\Entity\Module;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ModuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Module::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(), // Cacher le champ ID lors de la création
            AssociationField::new('enseignant') // Champ pour sélectionner un Enseignant
                ->setRequired(true)
                ->setQueryBuilder(function ($qb) {
                    // Vous pouvez ajouter des conditions pour filtrer les enseignants si nécessaire
                    return $qb;
                }),
            AssociationField::new('filiere') // Champ pour sélectionner une Filière
                ->setRequired(true)
                ->setQueryBuilder(function ($qb) {
                    // Vous pouvez ajouter des conditions pour filtrer les filières si nécessaire
                    return $qb;
                }),
            AssociationField::new('semestre') // Champ pour sélectionner un Semestre
                ->setRequired(true)
                ->setQueryBuilder(function ($qb) {
                    // Vous pouvez ajouter des conditions pour filtrer les semestres si nécessaire
                    return $qb;
                }),
            TextField::new('nom') // Champ pour saisir le nom du module
                ->setRequired(true),
        ];
    }
}
