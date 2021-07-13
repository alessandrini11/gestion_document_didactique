<?php

namespace App\Controller;

use App\Entity\Deplacement;
use App\Form\DeplacementType;
use App\Repository\DeplacementRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/deplacement")
 */
class DeplacementController extends AbstractController
{
    /**
     * @Route("/", name="deplacement_index", methods={"GET"})
     */
    public function index(DeplacementRepository $deplacementRepository): Response
    {
        return $this->render('deplacement/index.html.twig', [
            'deplacements' => $deplacementRepository->findBy(array(
                'confirmation_sortie' => 1,
                'confirmation_retour' => 1,
                'demande_retour' => 1,
            ),array(
                'date_retour' => 'ASC'
            )),
        ]);
    }

    /**
     * @Route("/new", name="deplacement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $deplacement = new Deplacement();
        $form = $this->createForm(DeplacementType::class, $deplacement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $deplacement->setPersonne($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($deplacement);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'Votre demande à été bien enregistré, veuillez attendre la confirmation de votre supérieur'
            );
            return $this->redirectToRoute('deplacement_index');
        }

        return $this->render('deplacement/new.html.twig', [
            'deplacement' => $deplacement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="deplacement_show", methods={"GET"})
     */
    public function show(Deplacement $deplacement): Response
    {
        return $this->render('deplacement/show.html.twig', [
            'deplacement' => $deplacement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="deplacement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Deplacement $deplacement): Response
    {
        $form = $this->createForm(DeplacementType::class, $deplacement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('deplacement_index');
        }

        return $this->render('deplacement/edit.html.twig', [
            'deplacement' => $deplacement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="deplacement_delete", methods={"POST"})
     */
    public function delete(Request $request, Deplacement $deplacement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$deplacement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($deplacement);
            $entityManager->flush();
            $this->addFlash(
                'danger',
                'La suppression a été avec succèss'
            );
        }

        return $this->redirectToRoute('deplacement_index');
    }


}
