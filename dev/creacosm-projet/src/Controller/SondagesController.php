<?php

namespace App\Controller;

use App\Entity\Sondage;
use App\Form\SondageType;
use App\Repository\SondageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sondages')]
class SondagesController extends AbstractController
{
    #[Route('/', name: 'app_sondages_index', methods: ['GET'])]
    public function index(SondageRepository $sondageRepository): Response
    {
        return $this->render('sondages/index.html.twig', [
            'sondages' => $sondageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sondages_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SondageRepository $sondageRepository): Response
    {
        $sondage = new Sondage();
        $form = $this->createForm(SondageType::class, $sondage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sondageRepository->save($sondage, true);

            return $this->redirectToRoute('app_sondages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sondages/new.html.twig', [
            'sondage' => $sondage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sondages_show', methods: ['GET'])]
    public function show(Sondage $sondage): Response
    {
        return $this->render('sondages/show.html.twig', [
            'sondage' => $sondage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sondages_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Sondage $sondage, SondageRepository $sondageRepository): Response
    {
        $form = $this->createForm(SondageType::class, $sondage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sondageRepository->save($sondage, true);

            return $this->redirectToRoute('app_sondages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sondages/edit.html.twig', [
            'sondage' => $sondage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sondages_delete', methods: ['POST'])]
    public function delete(Request $request, Sondage $sondage, SondageRepository $sondageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sondage->getId(), $request->request->get('_token'))) {
            $sondageRepository->remove($sondage, true);
        }

        return $this->redirectToRoute('app_sondages_index', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/repondre', name: 'app_creation')]
    public function answer(): Response
    {
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'SondageController',
        ]);
    }
}
