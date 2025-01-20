<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/apitest', name: 'api')]
public function api(HttpClientInterface $client): Response {
    $response = $client->request(
        'GET',
        'http://localhost:8001/api/'
    );

    return $this->render('api/index.html.twig', [
        'response' => $response,
    ]);
}

}
