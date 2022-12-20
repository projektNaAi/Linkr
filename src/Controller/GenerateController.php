<?php
namespace App\Controller;

use App\Entity\Link;
use App\Form\LinkType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class GenerateController extends AbstractController {
    public function index(): Response {
        return $this->render('gen/generate.html.twig');
    }

    public function new(Request $request): Response
    {
        // creates a task object and initializes some data for this example
        $link = new Link();
        //$link->setLongLink('longgggggggg');
        //$link->setShortLink('short');
        //$link->setDateCreated(new \DateTime('today'));

        $form = $this->createForm(LinkType::class, $link);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$link` variable has also been updated
            $link = $form->getData();

            // ... perform some action, such as saving the link to the database
            $entityManager->persist($link);
            $entityManager->flush();

            //return $this->redirectToRoute('task_success');
            return $this->render('gen/generate.html.twig');
        }

        return $this->render('gen/generate.html.twig', [
            'form' => $form,
        ]);

        // ...
    }
}