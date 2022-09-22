<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user_controler')]
    public function index(): Response
    {
        return $this->render('Frontend/Frontend/user_controler/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
