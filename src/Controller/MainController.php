<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController {
    public function loginPage(): Response {
        return $this->render('logowanie.html.twig');
    }
}