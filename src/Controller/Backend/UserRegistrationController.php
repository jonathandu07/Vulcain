<?php

namespace App\Controller\Backend;

use App\Entity\User;
use App\Form\UserRegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserRegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager
    ): Response {
        $user = new User();
        $form = $this->createForm(UserRegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // // $image = '/avatar-default.png';
            // $file = new UploadedFile("images/avatar-default.png", 'avatar-default.png');
            // // $file = new UploadedFile("upload_destination".$image, 'avatar-default.png');
            // $user ->setImageFile($file);
            // $user->setImageName('avatar-default.png');
            // $user->setImageSize(100);
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'User created successfully');
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }

        return $this->render('Backend/UserRegistration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
