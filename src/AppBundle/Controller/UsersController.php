<?php

// src/AppBundle/Controller/UserController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function registerAction()
    {
        return $this->render('users/register.html.twig');
    }
}
