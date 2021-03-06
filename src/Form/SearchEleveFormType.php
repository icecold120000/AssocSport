<?php

namespace App\Form;

use App\Entity\Classe;
use App\Repository\ClasseRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SearchEleveFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEleve', TextType::class,[
                'label' => 'Rechercher un élève',
                'required' => false,
            ])
            ->add('Classe', EntityType::class,[
                'label' => 'La classe de l\'élève',
                'class' => Classe::class,
                'query_builder' => function (ClasseRepository $er) {
                    return $er->createQueryBuilder('cl')
                        ->orderBy('cl.libelle', 'ASC');
                },
                'choice_label' => 'libelle',
                'required' => false,
            ])
            ->add('genreEleve', ChoiceType::class, [
                'label' => 'Le genre de l\'élève',
                'choices' => [
                    'Homme' => 'H',
                    'Femme' => 'F',
                ],
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
