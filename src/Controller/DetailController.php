<?php

namespace App\Controller;
use App\Entity\Metier;
use App\Entity\Demande;
use App\Form\DetailType;
use App\Form\Detail2Type;
use App\Entity\Travailleur;
use App\Repository\DetailRepository;
use App\Repository\TravailleurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    
    public function detail($id, SluggerInterface $slugger,Request $request): Response
    {
        $travailleur=$this->getDoctrine()->getRepository(Travailleur::class)->find($id) ;
        

        $demande = new Demande();
    $form = $this->createForm(DetailType::class,$demande);
        $form->handleRequest($request);

    
      
        if ($form->isSubmitted() && $form->isValid()) {
           
            $demande = $form->getData();
          
              

            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();
             
            // ... perform some action, such as saving the task to the database
             
            return $this->redirectToRoute('app_list_service');
        }
        // return $this->render('produit/ajout.html.twig', ["monform" => $form->createView()]);

   
        return $this->render('detail/detail.html.twig', ["travailleur" => $travailleur,
    
        'monform' => $form->createView(),
    ]);
    }














    



    
}
