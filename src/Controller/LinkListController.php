<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LinkListController extends AbstractController {
    public function index(): Response {
        return $this->render('linkList.html.twig');
    }
}