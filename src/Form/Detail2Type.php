<?php

namespace App\Form;

use App\Entity\Demande;
use App\Entity\Travailleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class Detail2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('message')
            ->add('addresse',TextType::class

            )
            ->add('travailleur',TetxType::class,[
               
                'class' => Travailleur::class,

                'attr' => [ 'hidden' => true
               
            
                ],
            

            ]
            
            
            )
            ->add('utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}
