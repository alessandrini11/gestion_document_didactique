<?php

namespace App\Controller;

use App\Repository\DeplacementRepository;
use App\Repository\DocumentRepository;
use App\Repository\PersonneRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PersonneRepository $personneRepo,DocumentRepository $documentRepo,TypeRepository $typeRepo,DeplacementRepository $deplacementRepo): Response
    {
        $documents = count($documentRepo->findAll());
        $types = count($typeRepo->findAll());
        $users = count($personneRepo->findAll());
        $deplacements = count($deplacementRepo->findBy(array(
            'confirmation_sortie' => 1,
            'confirmation_retour' => 1,
            'demande_retour' => 1
        )));
        $sorties = count($deplacementRepo->deplacementSortie());
        $retours = count($deplacementRepo->deplacementRetour());
        return $this->render('admin/index.html.twig', [
            'documents' => $documents,
            'types' => $types,
            'users' => $users,
            'deplacements' => $deplacements,
            'sorties' => $sorties,
            'retours' => $retours,
        ]);
    }
    /**
     * @Route("/sorties", name="sortie")
     */
    public function sorties(DeplacementRepository $repo): Response
    {
//        $deplacements = $repo->findBy(array(
//            'confirmation_sortie' => 0,
//            'confirmation_retour' => 0,
//            'confirmation_sortie' => 1,
//            'demande_retour' => 0
//        ),array(
//            'date_sortie' => 'DESC'
//        ));
        $deplacements = $repo->deplacementSortie();
        dump($deplacements);
        return $this->render('home/sortie.html.twig', [
            'deplacements' => $deplacements
        ]);
    }

    /**
     * @Route("/retours", name="retour")
     */
    public function retours(DeplacementRepository $repo): Response
    {
//        $deplacements = $repo->findBy(array(
//            'confirmation_sortie' => 1,
//            'demande_retour' => 1,
//            'confirmation_retour' => 0
//        ),array(
//            'date_sortie' => 'DESC'
//        ));
        $deplacements = $repo->deplacementRetour();
        dump($deplacements);
        return $this->render('home/retour.html.twig', [
            'deplacements' => $deplacements
        ]);
    }
}
