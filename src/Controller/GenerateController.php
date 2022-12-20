<?php
namespace App\Controller;

use App\Entity\Link;
use App\Form\LinkType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\LinkRepository;
use Doctrine\ORM\EntityManagerInterface;


class GenerateController extends AbstractController {
    public function index(): Response {
        return $this->render('gen/generate.html.twig');
    }

    public function new(Request $request, LinkRepository $linkRepository, EntityManagerInterface $entityManager): Response
    {
        // creates a task object and initializes some data for this example
        $link = new Link();
        //$link->setLongLink('longgggggggg');
        //$link->setShortLink('short');
        //$link->setDateCreated(new \DateTime('today'));

        $form = $this->createForm(LinkType::class, $link);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            if (!$user)
                return $this->render('gen/generate.html.twig');
            // $form->getData() holds the submitted values
            // but, the original `$link` variable has also been updated
            $link = $form->getData();

            // ... perform some action, such as saving the link to the database
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSUVWXYZ0123456789';
            $links = null;
            $shortcut = '';

            do {
                $shortcut = '';
                for ($i = 0; $i < 6; $i++) {
                    $shortcut .= substr($alphabet, rand(0, strlen($alphabet) - 1), 1);
                }
                $links = $linkRepository->findBy(['shortLink' => $shortcut]);
            } while (count($links) != 0);

            $link->setShortLink($shortcut);
            $link->setUser($user);
        
            $entityManager->persist($link);
            $entityManager->flush();

            //return $this->redirectToRoute('task_success');
            return $this->render('gen/generate.html.twig', [
                'short' => $shortcut
            ]);
        }

        return $this->render('gen/generate.html.twig', [
            'form1' => $form,
        ]);

        // ...
    }
}