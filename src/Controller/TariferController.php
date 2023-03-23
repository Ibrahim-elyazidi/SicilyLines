<?php

namespace App\Controller;

use App\Entity\Tarifer;
use App\Form\TariferType;
use App\Repository\TariferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tarifer')]
class TariferController extends AbstractController
{
    #[Route('/', name: 'app_tarifer_index', methods: ['GET'])]
    public function index(TariferRepository $tariferRepository): Response
    {
        return $this->render('tarifer/index.html.twig', [
            'tarifers' => $tariferRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tarifer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TariferRepository $tariferRepository): Response
    {
        $tarifer = new Tarifer();
        $form = $this->createForm(TariferType::class, $tarifer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tariferRepository->save($tarifer, true);

            return $this->redirectToRoute('app_tarifer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tarifer/new.html.twig', [
            'tarifer' => $tarifer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tarifer_show', methods: ['GET'])]
    public function show(Tarifer $tarifer): Response
    {
        return $this->render('tarifer/show.html.twig', [
            'tarifer' => $tarifer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tarifer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tarifer $tarifer, TariferRepository $tariferRepository): Response
    {
        $form = $this->createForm(TariferType::class, $tarifer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tariferRepository->save($tarifer, true);

            return $this->redirectToRoute('app_tarifer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tarifer/edit.html.twig', [
            'tarifer' => $tarifer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tarifer_delete', methods: ['POST'])]
    public function delete(Request $request, Tarifer $tarifer, TariferRepository $tariferRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tarifer->getId(), $request->request->get('_token'))) {
            $tariferRepository->remove($tarifer, true);
        }

        return $this->redirectToRoute('app_tarifer_index', [], Response::HTTP_SEE_OTHER);
    }
}
