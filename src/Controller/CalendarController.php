<?php

namespace App\Controller;

use App\Entity\EmploisDuTemps;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends AbstractController
{
    #[Route('/admin/calendar', name: 'admin_calendar')]
    public function index(): Response
    {
        return $this->render('calendar/index.html.twig');
    }
}
