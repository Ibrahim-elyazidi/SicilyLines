<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservController extends AbstractController
{
    #[Route('/reserv', name: 'app_reserv')]
    public function index(): Response
    {
        return $this->render('reserv/index.html.twig', [
            'controller_name' => 'ReservController',
        ]);
    }
}
