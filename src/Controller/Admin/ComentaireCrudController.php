<?php

namespace App\Controller\Admin;

use App\Entity\Comentaire;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ComentaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comentaire::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('comentaire'),
            TextField::new('travailleur'),
            TextField::new('utilisateur'),
          
        ];
    }
    
}
