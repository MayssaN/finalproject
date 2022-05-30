<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Metier;


use App\Entity\Demande;
use App\Entity\Actualite;
use App\Entity\Comentaire;
use App\Entity\Travailleur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ProjetTest');
    }

    public function configureMenuItems(): iterable
    { 
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
      
        yield MenuItem::linkToCrud ('Metier', 'fa fa-home',Metier::class);
        yield MenuItem::linkToCrud ('Travailleur', 'fa fa-home',Travailleur::class);
        yield MenuItem::linkToCrud ('user', 'fa fa-home',User::class);
        yield MenuItem::linkToCrud ('Demande', 'fa fa-home',Demande::class);
        yield MenuItem::linkToCrud ('Actualité', 'fa fa-home',Actualite::class);
        yield MenuItem::linkToCrud ('commentaire', 'fa fa-home',Comentaire::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
