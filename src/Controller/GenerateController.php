<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class GenerateController extends AbstractController {
    public function index(): Response {
        return $this->render('generate.html.twig');
    }
}