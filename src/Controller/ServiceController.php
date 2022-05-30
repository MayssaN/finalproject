<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Demande;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServiceController extends AbstractController
{
/**
     * @Route("/service/metier", name="app_service_metier")
     */
    public function index(): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }





        /**
     * @Route("/demande/{id}", name="app_list_service")
     */
    
    public function listeDemandeParID($id): Response
    {
        $user=$this->getDoctrine()->getRepository(User::class)->find($id) ;
        $demandes= $user->getDemandes();
        return $this->render('service/index.html.twig', ["demandes" => $demandes]);
    }


     /**
    * @Route("/demande/delete/{id}", name="app_demande_delete")
    */
    public function delete($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repos = $this->getDoctrine()->getRepository(Demande::class);
        $demande = $repos->find($id);
        $entityManager->remove($demande);
        $entityManager->flush();
        $this->addFlash(
            'notice',
            'la demande a ete supprimer avec succes'
        );
        return $this->redirectToRoute('app_home');
        //  $produits = $repos->chercherParIntervallePrix(10,1000);
       // dd($produits);
    }

    
}