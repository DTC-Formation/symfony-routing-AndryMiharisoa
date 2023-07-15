<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', TextType::class,['label' => 'Nom'])
            ->add('Prenom', TextType::class,['label' => 'Prénom'])
            ->add('Age')
            ->add('Cin')
            ->add('Adresse',TextType::class,['label'=>'Adresse lot'])
            ->add('Height', NumberType::class,[
                  'attr'=>[
                    'step'=>0.01,
                    'placeholder' =>'entre votre taille',
                   
                ]
            ])
        ;
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
