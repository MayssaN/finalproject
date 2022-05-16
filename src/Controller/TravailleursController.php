<?php

namespace App\Controller;
use App\Entity\Metier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TravailleursController extends AbstractController
{
    /**
     * @Route("/travailleurs", name="app_travailleurs")
     */
    public function index(): Response
    {
        return $this->render('travailleurs/index.html.twig', [
            'controller_name' => 'TravailleursController',
        ]);
    }


       /**
     * @Route("/list/{id}", name="app_list")
     */
    
    public function listetravailleurParmetier($id): Response
    {
        $metier=$this->getDoctrine()->getRepository(Metier::class)->find($id) ;
        $travailleurs= $metier->getTravailleurs();
        return $this->render('travailleurs/travailleurs.html.twig', ["travailleurs" => $travailleurs]);
    }

}
