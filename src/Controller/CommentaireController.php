<?php

namespace App\Controller;

use App\Entity\Comentaire;
use App\Entity\Travailleur;
use App\Form\CommentaireType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentaireController extends AbstractController
{
    /**
     * @Route("/commentaire", name="app_commentaire")
     */
    public function index(): Response
    {
        return $this->render('commentaire/com.html.twig', [
            'controller_name' => 'CommentaireController',
        ]);
    }





    /**
     * @Route("ajouter/trav/{id}", name="app_comentaire")
     */
    
    public function detail($id, SluggerInterface $slugger,Request $request): Response
    {
         
        $nb = $request->request->get('nb'); //method POST
        $trav=$this->getDoctrine()->getRepository(Travailleur::class)->find($id) ;
        $comm= $trav->getComentaires();


        $travailleur=$this->getDoctrine()->getRepository(Travailleur::class)->find($id) ;
        

        $commantaire = new Comentaire();
    $form = $this->createForm(CommentaireType::class,$commantaire);
        $form->handleRequest($request);

    
      
        if ($form->isSubmitted() && $form->isValid()) {
           
            $commantaire = $form->getData();
          
              

            $em = $this->getDoctrine()->getManager();
            $em->persist($commantaire);
            $em->flush();
             
            // ... perform some action, such as saving the task to the database
             
            return $this->redirectToRoute('app_comentaire');
        }
        // return $this->render('produit/ajout.html.twig', ["monform" => $form->createView()]);

   
        return $this->render('commentaire/com.html.twig', ["travailleur" => $travailleur,
    
        'monform' => $form->createView(),"comt"=> $comm,"nb" =>$nb ,
    ]);







}
}