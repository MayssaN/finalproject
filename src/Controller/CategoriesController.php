<?php

namespace App\Controller;

use App\Entity\Metier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories", name="app_categories")
     */
    public function index(Request $request): Response
    {     $nb = $request->query->get('nb'); //method GET
        $metiers = $this->getDoctrine()->getRepository(Metier::class)->findAll();
        
       
        return $this->render('categories/categories.html.twig', ["metiers" => $metiers,"nb" =>$nb]);
    }
}


