<?php

namespace App\Controller;

use App\Repository\BadProduitRepository;
use App\Repository\BadServiceRepository;
use App\Repository\CommentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\GeographiquZoneRepository;
use App\Repository\ProduitsRepository;
use App\Repository\ServicesRepository;

class UserController extends AbstractController
{
    public function __construct(
        private GeographiquZoneRepository $repoGeoZone,
        private CommentsRepository $repoComments,
        private ProduitsRepository $repoProduit,
        private ServicesRepository $repoService,
        private BadServiceRepository $repoBadService,
        private BadProduitRepository $repoBadProduit,
    ){

    }
    #[Route('/{User_Pseudo}', name: 'app_user_controler')]
    public function index(): Response
    {
        $geoZone = $this -> repoGeoZone -> findAll();
        $commentaire = $this -> repoComments->findAll();
        $produits = $this -> repoProduit->findAll();
        $service = $this -> repoService->findAll();
        $badService = $this -> repoBadService->findAll();
        $badproduit = $this -> repoBadProduit->findAll();

        return $this->render('Frontend/Frontend/user_controler/index.html.twig', [
            'geoZone' => $geoZone,
            'commentaire' => $commentaire,
            'produits' => $produits,
            'service' => $service,
            'badService' => $badService,
            'badproduit' => $badproduit,
        ]);
    }

    

    
}
