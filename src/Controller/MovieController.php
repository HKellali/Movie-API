<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/movie', name: 'app_movie', methods:['GET', 'HEAD'])]
    public function index(): Response
    {
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }

    #[Route('/movie/{name}', name: 'app_movie', defaults:['name' => null], methods:['GET', 'HEAD'])]
    public function movie($name): Response
    {
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
            'name' => $name,
        ]);
    }
}
