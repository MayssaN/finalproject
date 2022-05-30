<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Demande;
use App\Entity\Comentaire;
use App\Entity\Travailleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Shapecode\Bundle\HiddenEntityTypeBundle\Form\Type\HiddenEntityType;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
            
       

        ->add('comentaire' , TextareaType::class,[       
                
            'row_attr' => array('cols' => '5', 'rows' => '20') ,
            
            'attr' => [ 'placeholder' => 'Message',
            'class' => 'form-control w-150 ' ,

            ]   ,
            
            
         ] ) 
          




            ->add('travailleur', HiddenEntityType::class, array(
                'class' => Travailleur::class
                
                ) )


            ->add('utilisateur',HiddenEntityType::class, array(
                'class' => User::class))
        ;


       
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comentaire::class,
        ]);
    }
}
