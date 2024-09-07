<?php
// src/Controller/Admin/MatiereCrudController.php
namespace App\Controller\Admin;

use App\Entity\Matiere;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MatiereCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Matiere::class;
    }

/*     public function configureFields(string $pageName): iterable
    {
        return [
            'nom',
        ];
    } */
}
