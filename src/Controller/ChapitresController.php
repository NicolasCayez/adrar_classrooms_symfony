<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ChapitresController extends AbstractController
{
    #[Route('/chapitres', name: 'app_chapitres')]
    public function index(): Response
    {
        return $this->render('chapitres/index.html.twig', [
            'controller_name' => 'ChapitresController',
        ]);
    }
}
