<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Etudiant;
use App\Repository\NoteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BulletinController extends AbstractController
{
    #[Route('/bulletin/{id}', name: 'bulletin_show')]
    public function show(Etudiant $etudiant, NoteRepository $noteRepository): Response
    {
        $notes = $noteRepository->findBy(['etudiant' => $etudiant]);
        $moyenneGenerale = array_sum(array_map(fn($note) => $note->getNote(), $notes)) / count($notes);

        // Render the HTML
        $html = $this->renderView('bulletin/index.html.twig', [
            'etudiant' => $etudiant,
            'notes' => $notes,
            'moyenneGenerale' => $moyenneGenerale,
            'anneeAcademique' => '2023-2024', // Exemple d'année académique
        ]);

        // Configure Dompdf
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("bulletin.pdf", [
            "Attachment" => false
        ]);

        return new Response("PDF généré avec succès");
    }
}
