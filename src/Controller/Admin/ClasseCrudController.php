<?php
namespace App\Controller\Admin;

use App\Entity\Classe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\Response;

class ClasseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Classe::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des classes')
            ->setPageTitle('detail', fn (Classe $classe) => (string) $classe);
    }

    public function showSchedule(Classe $classe): Response
    {
        return $this->render('easy_admin/class_schedule.html.twig', [
            'entity' => $classe,
        ]);
    }
}
