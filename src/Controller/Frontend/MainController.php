<?php

namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('Frontend/main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/bienvenue', name: 'app_bienvenue')]
    public function choice(): Response
    {
        return $this->render('Frontend/main/bienvenue.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
