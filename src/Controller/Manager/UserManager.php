<?php

namespace App\Manager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class UserManager{

      private $entityManager;


  public function __construct(EntityManagerInterface $entityManager)
   {
    
    $this->entityManager=$entityManager;
 
   }

   public function getManager()
   {
      return $this->entityManager; 
   }
   

}


?>