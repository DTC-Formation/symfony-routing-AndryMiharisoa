<?php
 
namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
 
class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);

      //  return $this->json(['name'=>'rakoto']);
    }
 
    /**
     * @Route("/user/show-all", name="user_show_all", methods={"GET"})
     */
    public function showAll(): Response
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();
 
        $data = [];
 
        foreach ($users as $user) {
           $data[] = [
               'id' => $user->getId(),
               'nom' => $user->getNom(),
               'prenom' =>$user->getPrenom(),
               'age' =>$user->getAge(),
               'cin' => $user->getCIN(),
               'adresse' =>$user->getAdresse(),
               'height' =>$user->getHeight(),
           ];
        }
 
 
        return $this->json($data);
    }
 
    /**
     * @Route("/user/show/{id}", name="user_show", methods={"GET"})
     */
    public function show(int $id): Response
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);
 
        if (!$user) {
 
            return $this->json('No project found for id' . $id, 404);
        }
 
        $data =  [
            'id' => $user->getId(),
            'nom' => $user->getNom(),
            'prenom' =>$user->getPrenom(),
            'age' =>$user->getAge(),
            'cin' => $user->getCIN(),
            'adresse' =>$user->getAdresse(),
            'height' =>$user->getHeight(),
        ];
         
        return $this->json($data);
    }
 
    /**
     * @Route("/user/new", name="user_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
 
        $user = new User();
        $user->setNom($request->request->get('nom'));
        $user->setPrenom($request->request->get('prenom'));
        $user->setAge($request->request->get('age'));
        $user->setCIN($request->request->get('cin'));
        $user->setAdresse($request->request->get('adresse'));
        $user->setHeight($request->request->get('height'));

        
        $entityManager->persist($user);
        $entityManager->flush();
 
        return $this->redirectToRoute('user');
    }
 
    /**
     * @Route("/user/edit/{id}", name="user_edit", methods={"PUT"})
     */
    public function edit(Request $request, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);
 
        if (!$user) {
            return $this->json('No project found for id' . $id, 404);
        }
 
        $user->setNom($request->request->get('nom'));
        $user->setPrenom($request->request->get('prenom'));
        $user->setAge($request->request->get('age'));
        $user->setCIN($request->request->get('cin'));
        $user->setAdresse($request->request->get('adresse'));
        $user->setHeight($request->request->get('height'));
        $entityManager->flush();
 
        $data =  [
            'id' => $user->getId(),
            'nom' => $user->getNom(),
            'prenom' =>$user->getPrenom(),
            'age' =>$user->getAge(),
            'cin' => $user->getCIN(),
            'adresse' =>$user->getAdresse(),
            'heigth' =>$user->getHeigth(),
        ];
         
        return $this->json($data);
    }
 
    /**
     * @Route("/user/delete/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);
 
        if (!$user) {
            return $this->json('No project found for id' . $id, 404);
        }
 
        $entityManager->remove($user);
        $entityManager->flush();
 
        return $this->json('Deleted a project successfully with id ' . $id);
    }
 
 
}