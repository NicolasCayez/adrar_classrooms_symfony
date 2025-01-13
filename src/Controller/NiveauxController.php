<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NiveauxController extends AbstractController
{
    #[Route('/niveaux', name: 'app_niveaux')]
    public function index(): Response
    {
        return $this->render('niveaux/index.html.twig', [
            'controller_name' => 'NiveauxController',
        ]);
    }
}
