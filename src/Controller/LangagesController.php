<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LangagesController extends AbstractController
{
    #[Route('/langages', name: 'app_langages')]
    public function index(): Response
    {
        return $this->render('langages/index.html.twig', [
            'controller_name' => 'LangagesController',
        ]);
    }
}
