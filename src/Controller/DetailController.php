<?php

namespace App\Controller;
use App\Entity\Travailleur;
use App\Entity\Metier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route("/detail", name="app_detail")
     */
    public function index(): Response
    {
        return $this->render('detail/index.html.twig', [
            'controller_name' => 'DetailController',
        ]);
    }


 
 /**
     * @Route("/trav/{id}", name="app_travailleur")
     */
    
    public function detail($id): Response
    {
        $travailleur=$this->getDoctrine()->getRepository(Travailleur::class)->find($id) ;
        
        return $this->render('detail/detail.html.twig', ["travailleur" => $travailleur]);
    }

}
