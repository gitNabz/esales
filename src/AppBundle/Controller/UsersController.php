<?php

// src/AppBundle/Controller/UserController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    /**
     * @Route("/users", name="users.index")
     */
    public function indexAction()
    {
        // Récupérer dans un premier temps la liste des utilisateurs
        // $pdo = new \PDO('mysql:host=localhost;dbname=symfony', 'root', 'troiswa');
        // $query = $pdo->prepare('SELECT * FROM users');
        // $query->execute();
        // $users = $query->fetchAll(\PDO::FETCH_ASSOC);

        // Récupérer la liste des utilisateurs avec doctrine
        $repository = $this->getDoctrine()->getRepository('AppBundle\Entity\User');
        $users = $repository->findAll();

        // Récupérer un utilisateur à partir de son id avec doctrine
        $user = $repository->find(5); // Récupère l'utilisateur numéro 5

        

        // On charge la vue avec les données récupérées
        return $this->render('users/index.html.twig', [
            'users' => $users
        ]);
    }

        /**
     * @Route("/users/{id}", name="users.show", requirements={"id"="\d+"})
     */
    public function userAction($id)
    {
        // Récupérer dans un premier temps la liste des utilisateurs
        // $pdo = new \PDO('mysql:host=localhost;dbname=symfony', 'root', 'troiswa');
        // $query = $pdo->prepare('SELECT * FROM users');
        // $query->execute();
        // $users = $query->fetchAll(\PDO::FETCH_ASSOC);

        // Récupérer la liste des utilisateurs avec doctrine
        $repository = $this->getDoctrine()->getRepository('AppBundle\Entity\User');

        // Récupérer un utilisateur à partir de son id avec doctrine
        $user = $repository->find($id); // Récupère l'utilisateur numéro 5

        // On charge la vue avec les données récupérées
        return $this->render('users/users.html.twig', [
            'user' => $user
        ]);
    }

/**
     * @Route("/users/{name}", name="users.name")
     */
    public function usernameAction($name)
    {
        // Récupérer la liste des utilisateurs avec doctrine
        $repository = $this->getDoctrine()->getRepository('AppBundle\Entity\User');

        // Récupérer un utilisateur à partir de son id avec doctrine
        $user = $repository->findOneByLastname($name); // Récupère l'utilisateur numéro 5

        // On charge la vue avec les données récupérées
        return $this->render('users/users.html.twig', [
            'user' => $user
        ]);
    }
}
