<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEvenement')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('lieuEvenement')
            ->add('coutEvenement')
            ->add('descripEvenement')
            ->add('nbPlace')
            ->add('imageEvenement')
            ->add('vignetteEvenement')
            ->add('Type')
            ->add('Sport')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
