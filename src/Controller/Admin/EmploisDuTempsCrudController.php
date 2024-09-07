<?php
namespace App\Controller\Admin;

use App\Entity\EmploisDuTemps;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

final class EmploisDuTempsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EmploisDuTemps::class;
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'EmploisDuTemps du Temps')
            ->setDefaultSort(['debut' => 'ASC']);
    }

    

}
