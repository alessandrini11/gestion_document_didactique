<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/sorties", name="sortie")
     */
    public function sorties(): Response
    {
        return $this->render('home/sortie.html.twig', [

        ]);
    }

    /**
     * @Route("/retours", name="retour")
     */
    public function retours(): Response
    {
        return $this->render('home/retour.html.twig', [

        ]);
    }
}
