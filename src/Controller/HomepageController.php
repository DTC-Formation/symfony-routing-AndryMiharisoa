<?php

namespace App\Controller;
use App\Controller\isValidOperator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
   // #[Route('/{nom?}/{prenom?}', name: 'app_homepage')]
    #[Route('/', name: 'app_homepage', methods: ['GET','POST'])]
  //  public function index( ?string $nom , ?string $prenom ): Response
   // public function index( ?string $nom , ?string $prenom ): Response
      public function index(Request $request): Response
    { 
      $nombre1 = $request->request->get('nombre1');
      $operateur = $request->request->get('operateur');
      $nombre2 = $request->request->get('nombre2');

      // Vérifier si les valeurs nécessaires sont présentes
      if ($nombre1 && $operateur && $nombre2) {
          // Effectuer le calcul en fonction de l'opérateur
          if ($operateur === '+') {
              $resultat = $nombre1 + $nombre2;
          } elseif ($operateur === '-') {
              $resultat = $nombre1 - $nombre2;
          } elseif ($operateur === '*') {
              $resultat = $nombre1 * $nombre2;
          } else {
              $resultat = null;
          }
      } else {
          $resultat = null;
      }

      return $this->render('homepage/index.html.twig',[

     ]);
    }
}


