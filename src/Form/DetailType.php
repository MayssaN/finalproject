<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Demande;
use App\Entity\Travailleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Shapecode\Bundle\HiddenEntityTypeBundle\Form\Type\HiddenEntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
            
       


        ->add('email', TextType::class,   [
               
            'attr' => [ 'placeholder' => 'Email',
          
           
           

            ],
        ])
            ->add('addresse', TextType::class,   [
               
                'attr' => [ 'placeholder' => 'Adresse Postale',
              
               
               

                ],
            ])

          


            ->add('message' , TextareaType::class,[       
                
                'row_attr' => array('cols' => '5', 'rows' => '5') ,
                
                'attr' => [ 'placeholder' => 'Message',
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
            'data_class' => Demande::class,
        ]);
    }
}
