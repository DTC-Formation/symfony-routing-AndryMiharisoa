<?php

namespace App\Controller;

use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrainingResponseController extends AbstractController
{
    #[Route('/training/response', name:'app_training_response')]
    public function index(): Response
    {
        return $this->render('training_response/index.html.twig', [
            'controller_name' => 'TrainingResponseController',
        ]);
    }

    #[Route('/download', name: 'app_training_download')]

    public function download(): BinaryFileResponse
    {
      
         return $this->file('ExpectiMax.pdf');
    } 

    #[Route('/api', name:'app_training_register')]

    public function API(): JsonResponse
    {
        return $this->json([
            'id'=>rand(1,2),
            'age'=>'447'
    ]);
    }
}
