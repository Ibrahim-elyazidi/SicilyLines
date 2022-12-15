<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmResaController extends AbstractController
{
    /** #[Route('/confirm/resa', name: 'app_confirm_resa')] */
    public function index(): Response
    {
        return $this->render('confirm_resa/index.html.twig', [
            'controller_name' => 'ConfirmResaController',
        ]);
    }
}
