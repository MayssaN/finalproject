<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actualite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            ImageField::new('image')->setBasePath('uploads/images/trav/')->setUploadDir('public/uploads/images/trav'),
            
            TextField::new('contenu'),
               
            DateField::new('date'),
          
           
        ];
    }
    
}
