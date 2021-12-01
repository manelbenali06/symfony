<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]// il se trouve dans l'url et exécute la function
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [//render créer une vue home/index.html.twig
            'controller_name' => 'HomeController',//chaine de carractere on le retrouve dans index c'est un rendu d'une vue
        ]);
    }
}
