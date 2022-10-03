<?php

namespace App\Controller\Backend;

use App\Entity\Produits;
use App\Form\ProduitsType;
use App\Repository\ProduitsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitsController extends AbstractController
{
    public function __construct(
        private ProduitsRepository $produitsRepository,
    ){}
    
    #[Route('/produits', name: 'app_produits')]
    public function index(): Response
    {
        return $this->render('produits/index.html.twig', [
            'controller_name' => 'ProduitsController',
        ]);
    }

    #[Route('/produits/edit/{id}', name: 'app_produits_edit', methods: ['GET', 'POST'])]
    public function editProduits(Produits $produits, Request $request)
    {
        $form = $this->createForm(ProduitsType::class, $produits);
        $form -> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->produitsRepository->add($produits, true);
            $this-> addFlash('success', 'Produit modifié avec succès');

            return $this->redirectToRoute('app_user_controler');
        }

        return $this->render('Backend/Produits/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/produits/delete/{id}', name: 'app_produits_remove', methods: 'DELETE|POST')]
    public function deleteProduits(Produits $produits, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $produits->getId(), $request->get('_token')))
        {
            $this ->produitsRepository->remove($produits, true);
            $this->addFlash('success', 'Produit supprimmé avec succès');

            return $this->redirectToRoute('app_user_controler');
        }

        $this ->addFlash('error', 'Produit innexistant');

        return $this->redirectToRoute('app_user_controler');
    }
}
