<?php
// src/EventSubscriber/CalendarSubscriber.php
namespace App\EventSubscriber;

use App\Repository\EmploisDuTempsRepository;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\SetDataEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CalendarSubscriber implements EventSubscriberInterface
{
    private $emploisDuTempsRepository;

    public function __construct(EmploisDuTempsRepository $emploisDuTempsRepository)
    {
        $this->emploisDuTempsRepository = $emploisDuTempsRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            SetDataEvent::class => 'onCalendarSetData',
        ];
    }

    public function onCalendarSetData(SetDataEvent $setDataEvent)
    {
        $start = $setDataEvent->getStart();
        $end = $setDataEvent->getEnd();
        $filters = $setDataEvent->getFilters();

        $emploisDuTemps = $this->emploisDuTempsRepository
            ->createQueryBuilder('e')
            ->where('e.debut BETWEEN :start AND :end OR e.fin BETWEEN :start AND :end')
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->setParameter('end', $end->format('Y-m-d H:i:s'))
            ->getQuery()
            ->getResult();

        foreach ($emploisDuTemps as $emploisDuTemps) {
            $event = new Event(
                $emploisDuTemps->getMatiere()->getNom(),
                $emploisDuTemps->getDebut(),
                $emploisDuTemps->getFin()
            );
            $setDataEvent->addEvent($event);
        }
    }
}
