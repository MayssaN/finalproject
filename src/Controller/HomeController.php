<?php

namespace App\Controller;
use App\Entity\Metier;
use App\Entity\Actualite;
use App\Entity\Travailleur;
use App\Repository\MetierRepository;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    
 /**
     * @Route("/home", name="app_home")
     */
    public function allmetier(Request $request): Response
    {
        $nb = $request->query->get('nb'); //method GET 
        $metiers = $this->getDoctrine()->getRepository(Metier::class)->findAll();
        $actualites=$this->getDoctrine()->getRepository(Actualite::class)->findALL() ;
       
        return $this->render('home/index.html.twig', ["metiers" => $metiers,"nb" =>$nb,"actualite"=>$actualites]);
    }

       /**
     * @Route("/list/{id}", name="app_list")
     */
    
    public function listetravailleurParmetier($id): Response
    {
        $metier=$this->getDoctrine()->getRepository(Metier::class)->find($id) ;
        $travailleurs= $metier->getTravailleurs();
        return $this->render('home/index.html.twig', ["travailleurs" => $travailleurs]);
    }

    
    

    


}



