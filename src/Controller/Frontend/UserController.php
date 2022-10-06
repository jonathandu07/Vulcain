<?php

namespace App\Controller\Frontend;

use App\Entity\User;
use App\Entity\Comments;
use App\Entity\Produits;
use App\Entity\Services;
use App\Form\ServiceType;
use App\Entity\BadProduit;
use App\Entity\BadService;
use App\Form\ProduitsType;
use App\Form\BadServiceType;
use App\Form\BadProduitsType;
use App\Entity\GeographiqueZone;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Form\UserRegistrationFormType;
use App\Repository\CommentsRepository;
use App\Repository\ProduitsRepository;
use App\Repository\ServicesRepository;

use App\Repository\BadProduitRepository;
use App\Repository\BadServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use App\Repository\GeographiqueZoneRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    public function __construct(
        private GeographiqueZoneRepository $repoGeoZone,
        private CommentsRepository $repoComments,
        private ProduitsRepository $repoProduit,
        private ServicesRepository $repoService,
        private BadServiceRepository $repoBadService,
        private BadProduitRepository $repoBadProduit,
        private UserRepository $repoUser,

    ) {
    }

    #[Route('/{User_Pseudo}', name: 'app_user_controler')]
    public function index(?User $user): Response
    {
        if (!$user instanceof User) {
            $this->addFlash('error', 'User non trouvé');

            return $this->redirectToRoute('app_main');
        }
        
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
            'user' => $user,    
        ]);
    }

    #[Route('/{User_Pseudo}/geoZone', name: 'app_user_controler_geoZone')]
    public function geoZoneAction(Request $request, Security $security, User $user): Response
    {
        if (!$user instanceof User) {
            $this->addFlash('error', 'User non trouvé');

            return $this->redirectToRoute('app_main');
        }

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
    public function commentaireAction(?User $user, Request $resquest): Response 
    {
        if(!$user instanceof User) {
            $this->addFlash('error', 'User non trouvé');

            return $this->redirectToRoute('app_main');
        }

        $comment = new Comments();
        $commentForm = $this -> createForm(RegistrationFormType::class, $comment);
        $commentForm -> handleRequest($resquest);

        if($commentForm->isSubmitted() && $commentForm->isValid()){
            $this->repoComments->add($this->$comment, true);

            $this->addFlash('sucess', 'copmentaire ajouté avec succés');
            return $this->redirectToRoute('app_user_controler', [
                'User_Pseudo' => $user->getUserPseudo()
            ]);
        }

        return $this->renderForm('Frontend/user_controler/_commentForm.html.twig', [
            'commentForm' => $commentForm,
        ]);
    }

    #[Route('/{User_Pseudo}/produit', name: 'app_user_controler_produit')]

    public function produitAction(Request $request, User $user) {
        if (!$user instanceof User) {
            $this->addFlash('error', 'User non trouvé');

            return $this->redirectToRoute('app_main');
        }

        $produit = new Produits();
        $produitform = $this -> createForm(ProduitsType::class, $produit);
        $produitform -> handleRequest($request);

        if($produitform -> isSubmitted() && $produitform->isValid()){
            $this ->repoProduit -> add($produit, true);

            $this ->addFlash('success', 'Produit ajouté');
            return $this ->redirectToRoute('app_user_controler', [
                'User_Pseudo' => $user -> getUserPseudo()
            ]);
        }

        return $this -> renderForm('Frontend/user_controler/_produitForm.html.twig',[
            'produitForm' => $produitform,
        ]);
    }

    #[Route('/{User_Pseudo}/service', name: 'app_user_controler_service')]
    public function serviceAction(Request $request, User $user)
    {
        if (!$user instanceof User) {
            $this->addFlash('error', 'User non trouvé');

            return $this->redirectToRoute('app_main');
        }
        $service = new Services();
        $serviceform = $this->createForm(ServiceType::class, $service);
        $serviceform->handleRequest($request);

        if ($serviceform->isSubmitted() && $serviceform->isValid()) {
            $this->repoService->add($service, true);

            $this->addFlash('success', 'Service ajouté');
            return $this->redirectToRoute('app_user_controler', [
                'User_Pseudo' => $user->getUserPseudo()
            ]);
        }

        return $this->renderForm('Frontend/user_controler/_serviceForm.html.twig', [
            'serviceForm' => $serviceform,
        ]);
    }

    #[Route('/{User_Pseudo}/badService', name: 'app_user_controler_badService')]
    public function badServiceAction(Request $request, User $user)
    {
        if (!$user instanceof User) {
            $this->addFlash('error', 'User non trouvé');

            return $this->redirectToRoute('app_main');
        }

        $badService = new BadService();
        $badServiceform = $this->createForm(BadServiceType::class, $badService);
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
        if (!$user instanceof User) {
            $this->addFlash('error', 'User non trouvé');

            return $this->redirectToRoute('app_main');
        }

        $badproduit = new BadProduit();
        $badproduitform = $this->createForm(BadProduitsType::class, $badproduit);
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

    #[Route('/{User_Pseudo}/edit', name: 'app_user_controler_edit', methods: ['GET|POST'])]
    public function editUser(User $user, Request $request): Response
    {
        $form = $this->createForm(UserRegistrationFormType::class, $user);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->repoUser ->add($user, true);
            $this->addFlash('success', 'Utilisateur modifé avec succès');

            return $this ->redirectToRoute('app_user_controler', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('Frontend/user_controler/_edit.html.twig', [
            'form' => $form,
            'user' => $user,
            'title_heading' => 'Modifier son profil',
        ]);
    }

    #[Route('/{User_Pseudo}', name: 'app_user_controler_delete', methods: ['POST'])]
    public function deleteUser(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->get('_token')))
        {
            $this->repoUser->remove($user, true);
        }

        return $this->redirectToRoute('app_logout', [], Response::HTTP_SEE_OTHER);
    }
}
