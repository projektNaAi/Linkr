<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class MainController {
    public function loginPage(): Response {
        return new Response("<html><body>Panel logowania</body></html>");
    }
}