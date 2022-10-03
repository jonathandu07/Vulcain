<?php

namespace App\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeographiqueZoneController extends AbstractController
{
    #[Route('/geographique/zone', name: 'app_geographique_zone')]
    public function index(): Response
    {
        return $this->render('geographique_zone/index.html.twig', [
            'controller_name' => 'GeographiqueZoneController',
        ]);
    }
}
