<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact/{id}', name: 'app_contact')]
    public function index(Request $request ): Response
    {
       // var_dump($request);
        return $this->render('contact/index.html.twig');
    }
}
