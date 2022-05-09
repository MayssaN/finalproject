<?php

namespace App\Controller\Admin;

use App\Entity\Travailleur;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType ; 

class TravailleurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Travailleur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
          
            TextField::new('nom'),
            ImageField::new('image')->setBasePath('uploads/images/trav/')->setUploadDir('public/uploads/images/trav'),
            
            TextField::new('prenom'),
            TextField::new('email'),
            IntegerField::new('telph'),
            AssociationField::new('metier'),
           

        ];
    }
    
}
