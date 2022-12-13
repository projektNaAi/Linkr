<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ManageAccountController extends AbstractController {
    public function index(): Response {
        return $this->render('manageAccount.html.twig');
    }
}