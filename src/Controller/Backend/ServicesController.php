<?php

namespace App\Controller\Backend;

use App\Entity\Produits;
use App\Entity\Services;
use App\Form\ServiceType;
use App\Repository\ProduitsRepository;
use App\Repository\ServicesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServicesController extends AbstractController
{
    public function __construct(
        // private Services $services,
        private ServicesRepository $servicesRepository,
        // private Request $request
    ){}

    #[Route('/services', name: 'app_services')]
    public function index(): Response
    {
        return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
        ]);
    }

    #[Route('/services/edit/{id}', name:'app_services_edit', methods: ['GET', 'POST'])]
    public function editService(Services $services, Request $request)
    {
        $form =$this->createForm(ServiceType::class, $services);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->servicesRepository ->add($services, true);
            $this->addFlash('success','service modifié avec succès');

            return $this->redirectToRoute('app_user_controler');
        }

        return $this -> renderForm(
            'Backend/Services/edit.html.twig',
            ['form' => $form]
        );
    }

    #[Route('/services/delete/{id}', name:'app_services_delete', methods: 'DELETE|POST')]
    public function deleteService(Services $services, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $services->getId(), $request->get('_token')))
        {
            $this ->servicesRepository->remove($services, true);
            $this -> addFlash('success', 'Services supprimé avec succès');

            return $this->redirectToRoute('app_user_controler');
        }

        $this ->addFlash('error', 'le token n\'est pas valide');

        return $this->redirectToRoute('app_user_controler');
    }
}
