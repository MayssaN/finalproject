<?php

namespace App\Controller\Admin;

use App\Entity\Demande;
use App\Entity\Travailleur;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DemandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Demande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
  
               
            TextField::new('message'),
            TextField::new('addresse'),
            TextField::new('nom'),
            TextField::new('email'),
            TextField::new('travailleur'),
            TextField::new('utilisateur'),
        ];
    }
    
}
