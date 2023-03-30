<?php

namespace App\Controller;

use App\Entity\TypeReservation;
use App\Form\TypeReservationType;
use App\Repository\TypeReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type_reservation')]
class TypeReservationController extends AbstractController
{
    #[Route('/', name: 'app_type_reservation_index', methods: ['GET'])]
    public function index(TypeReservationRepository $typeReservationRepository): Response
    {
        return $this->render('type_reservation/index.html.twig', [
            'type_reservations' => $typeReservationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_reservation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeReservationRepository $typeReservationRepository): Response
    {
        $typeReservation = new TypeReservation();
        $form = $this->createForm(TypeReservationType::class, $typeReservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeReservationRepository->save($typeReservation, true);

            return $this->redirectToRoute('app_type_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_reservation/new.html.twig', [
            'type_reservation' => $typeReservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_reservation_show', methods: ['GET'])]
    public function show(TypeReservation $typeReservation): Response
    {
        return $this->render('type_reservation/show.html.twig', [
            'type_reservation' => $typeReservation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_reservation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeReservation $typeReservation, TypeReservationRepository $typeReservationRepository): Response
    {
        $form = $this->createForm(TypeReservationType::class, $typeReservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeReservationRepository->save($typeReservation, true);

            return $this->redirectToRoute('app_type_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_reservation/edit.html.twig', [
            'type_reservation' => $typeReservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_reservation_delete', methods: ['POST'])]
    public function delete(Request $request, TypeReservation $typeReservation, TypeReservationRepository $typeReservationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeReservation->getId(), $request->request->get('_token'))) {
            $typeReservationRepository->remove($typeReservation, true);
        }

        return $this->redirectToRoute('app_type_reservation_index', [], Response::HTTP_SEE_OTHER);
    }
}
