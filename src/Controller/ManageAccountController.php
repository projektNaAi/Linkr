<?php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\ChangeLoginFormType;
use App\Form\ChangePasswordFormType;
use App\Form\RemoveAccountFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class ManageAccountController extends AbstractController {
    // public function index(): Response {
    //     return $this->render('manageAccount.html.twig');
    // }

    public function changeLoginPassword(Request $request,UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        $user = $this->getUser();
        
        $loginForm = $this->createForm(ChangeLoginFormType::class, $user);
        $loginForm->handleRequest($request);

        $passwordForm = $this->createForm(ChangePasswordFormType::class, $user);
        $passwordForm->handleRequest($request);

        $removeForm = $this->createForm(RemoveAccountFormType::class, $user);
        $removeForm->handleRequest($request);

        if ($loginForm->isSubmitted() && $loginForm->isValid()) {
            $user->setUsername($loginForm->get('username')->getData());

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('main');
        }

        if ($passwordForm->isSubmitted() && $passwordForm->isValid()) {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $passwordForm->get('password')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('main');
        }

        if ($removeForm->isSubmitted() && $removeForm->isValid()) {
            
            $entityManager->remove($user);
            $entityManager->flush();
            
            $request->getSession()->invalidate();
            $this->container->get('security.token_storage')->setToken(null);
            return $this->redirectToRoute('app_logout');
        }

        return $this->render('manageAccount.html.twig', [
            'changeLoginForm' => $loginForm->createView(),
            'changePasswordForm' => $passwordForm->createView(),
            'removeAccountForm' => $removeForm->createView(),
        ]);
    }
}