<?php

namespace App\Controller\Admin;

use App\Entity\Note;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NoteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Note::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('etudiant') // Affiche une liste déroulante pour sélectionner un étudiant
                ->setRequired(true),
            AssociationField::new('module') // Affiche une liste déroulante pour sélectionner un module
                ->setRequired(true),
            NumberField::new('note') // Affiche un champ pour la note
                ->setRequired(true),
            TextField::new('observation') // Affiche un champ pour l'observation
        ];
    }
}
