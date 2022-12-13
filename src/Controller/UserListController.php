<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class UserListController extends AbstractController {
    public function index(): Response {
        return $this->render('userList.html.twig');
    }
}