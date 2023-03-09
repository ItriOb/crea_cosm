<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RacineController extends AbstractController
{

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/accueil', name: 'app_accueil')]
    public function accueil(): Response
    {
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/signin', name: 'app_connexion')]
    public function signin(): Response
    {
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/signup', name: 'app_incription')]
    public function signup(): Response
    {
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/moncompte', name: 'app_moncompte')]
    public function account(): Response
    {
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
