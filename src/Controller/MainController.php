<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\LinkRepository;

class MainController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    public function show(string $shortcut, LinkRepository $linkRepository): Response
    {
        if (empty($shortcut))
            return $this->redirectToRoute('main');

        $link = $linkRepository->findOneBy(['shortLink' => $shortcut]);
        if (!$link)
            return $this->redirectToRoute('main');

        return $this->redirect($link->getLongLink());
    }
}