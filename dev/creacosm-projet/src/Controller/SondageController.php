<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/sondage')]
class SondageController extends AbstractController
{
    #[Route('/', name: 'app_sondage')]
    public function index(): Response
    {
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'SondageController',
        ]);
    }

    #[Route('/creer', name: 'app_creation')]
    public function create(): Response
    {
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'SondageController',
        ]);
    }

    #[Route('/repondre', name: 'app_creation')]
    public function answer(): Response
    {
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'SondageController',
        ]);
    }

    #[Route('/modifier', name: 'app_creation')]
    public function modify(): Response
    {
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'SondageController',
        ]);
    }
}
