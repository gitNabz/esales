<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/test", name="testpage")
     */
    public function testAction()
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/hello/{name}/age/{age}", name="hello")
     */
    public function helloAction($name, $age)
    {
        // $name va être récupéré par rapport à ce qu'il y a dans l'url
        // echo "Bonjour $name, tu as $age ans";

        // Je passe cette variable à ma vue
        $users = [
            [
                'name' => 'Jean Dupont',
                'age' => 50
            ],
            [
                'name' => 'Toto',
                'age' => 20
            ]
        ];

        // Je vais passer $age et $name en paramètres à ma vue
        // Je les ajoute dans le tableau (2ème paramètre de la fonction render)
        return $this->render('default/hello.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'name' => $name,
            'age' => $age,
            'users' => $users
        ]);
    }
}