<?php

namespace App\Controller;

use App\Entity\BadProduit;
use App\Entity\BadService;
use App\Entity\User;
use App\Entity\Comments;
use App\Entity\GeographiqueZone;
use App\Entity\Produits;
use App\Entity\Services;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Repository\CommentsRepository;
use App\Repository\ProduitsRepository;
use App\Repository\ServicesRepository;
use App\Repository\BadProduitRepository;

use App\Repository\BadServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\GeographiquZoneRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    public function __construct(
        private GeographiquZoneRepository $repoGeoZone,
        private CommentsRepository $repoComments,
        private ProduitsRepository $repoProduit,
        private ServicesRepository $repoService,
        private BadServiceRepository $repoBadService,
        private BadProduitRepository $repoBadProduit,
        private UserRepository $repoUser,

    ) {
    }
    #[Route('/{User_Pseudo}', name: 'app_user_controler')]
    public function index(): Response
    {
        $geoZone = $this->repoGeoZone->findAll();
        $commentaire = $this->repoComments->findAll();
        $produits = $this->repoProduit->findAll();
        $service = $this->repoService->findAll();
        $badService = $this->repoBadService->findAll();
        $badproduit = $this->repoBadProduit->findAll();

        return $this->render('Frontend/user_controler/index.html.twig', [
            'geoZone' => $geoZone,
            'commentaire' => $commentaire,
            'produits' => $produits,
            'service' => $service,
            'badService' => $badService,
            'badproduit' => $badproduit,
        ]);
    }

    #[Route('/{User_Pseudo}/geoZone', name: 'app_user_controler_geoZone')]
    public function geoZoneAction(Request $request, Security $security, User $user): Response
    {

        $geo = new GeographiqueZone();
        $geoZoneForm = $this->createForm(RegistrationFormType::class, $geo);
        $geoZoneForm->handleRequest($request);

        if ($geoZoneForm->isSubmitted() && $geoZoneForm->isValid()) {
            $this->repoGeoZone->add($this->$geo, true);

            $this->addFlash('success', 'zone géographique entrée');
            return $this->redirectToRoute('app_user_controler', [
                'User_Pseudo' => $this->$user->getUserPseudo()
            ]);
        }

        return $this->renderForm('Frontend/user_controler/_geoZonForm.html.twig', [
            'geoZoneForm' => $geoZoneForm,
        ]);
    }

    #[Route('/{User_Pseudo}/commentaire', name:'app_user_controler_commentaire')]
    public function commentaireAction(Request $resquest, User $user): Response 
    {
        $comment = new Comments();
        $commentForm = $this -> createForm(RegistrationFormType::class, $comment);
        $commentForm -> handleRequest($resquest);

        if($commentForm->isSubmitted() && $commentForm->isValid()){
            $this->repoComments->add($this->$comment, true);

            $this->addFlash('sucess', 'copmentaire ajouté avec succés');
            return $this->redirectToRoute('app_user_controler', [
                'User_Pseudo' => $this->user->getUserPseudo()
            ]);
        }

        return $this->renderForm('Frontend/user_controler/_commentForm.html.twig', [
            'commentForm' => $commentForm,
        ]);
    }

    #[Route('/{User_Pseudo}/produit', name: 'app_user_controler_produit')]
    public function produitAction(Request $request, User $user) {
        $produit = new Produits();
        $produitform = $this -> createForm(RegistrationFormType::class, $produit);
        $produitform -> handleRequest($request);

        if($produitform -> isSubmitted() && $produitform->isValid()){
            $this ->repoProduit -> add($this -> $produit, true);

            $this ->addFlash('success', 'Produit ajouté');
            return $this ->redirectToRoute('app_user_controler', [
                'User_Pseudo' => $this -> user -> getUserPseudo()
            ]);
        }

        return $this -> renderForm('Frontend/user_controler/_produitForm.html.twig',[
            'produitForm' => $produitform,
        ]);
    }

    #[Route('/{User_Pseudo}/service', name: 'app_user_controler_service')]
    public function serviceAction(Request $request, User $user)
    {
        $service = new Services();
        $serviceform = $this->createForm(RegistrationFormType::class, $service);
        $serviceform->handleRequest($request);

        if ($serviceform->isSubmitted() && $serviceform->isValid()) {
            $this->repoService->add($this->$service, true);

            $this->addFlash('success', 'Service ajouté');
            return $this->redirectToRoute('app_user_controler', [
                'User_Pseudo' => $this->user->getUserPseudo()
            ]);
        }

        return $this->renderForm('Frontend/user_controler/_serviceForm.html.twig', [
            'serviceForm' => $serviceform,
        ]);
    }

    #[Route('/{User_Pseudo}/badService', name: 'app_user_controler_badService')]
    public function badServiceAction(Request $request, User $user)
    {
        $badService = new BadService();
        $badServiceform = $this->createForm(RegistrationFormType::class, $badService);
        $badServiceform->handleRequest($request);

        if ($badServiceform->isSubmitted() && $badServiceform->isValid()) {
            $this->repoBadService->add($this->$badService, true);

            $this->addFlash('success', 'Service signalé');
            return $this->redirectToRoute('app_user_controler', [
                'User_Pseudo' => $this->user->getUserPseudo()
            ]);
        }

        return $this->renderForm('Frontend/user_controler/_badServiceForm.html.twig', [
            'badServiceForm' => $badServiceform,
        ]);
    }

    #[Route('/{User_Pseudo}/badproduit', name: 'app_user_controler_badproduit')]
    public function badproduitction(Request $request, User $user)
    {
        $badproduit = new BadProduit();
        $badproduitform = $this->createForm(RegistrationFormType::class, $badproduit);
        $badproduitform->handleRequest($request);

        if ($badproduitform->isSubmitted() && $badproduitform->isValid()) {
            $this->repoService->add($this->$badproduit, true);

            $this->addFlash('success', 'Produi signalé');
            return $this->redirectToRoute('app_user_controler', [
                'User_Pseudo' => $this->user->getUserPseudo()
            ]);
        }

        return $this->renderForm('Frontend/user_controler/_badProduitForm.html.twig', [
            'badproduitForm' => $badproduitform,
        ]);
    }
}
