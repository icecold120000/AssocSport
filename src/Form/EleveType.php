<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEleve')
            ->add('prenomEleve')
            ->add('dateNaissance')
            ->add('genreEleve')
            ->add('dateCreation')
            ->add('dateMaj')
            ->add('archiveEleve')
            ->add('numTelEleve')
            ->add('numTelParent')
            ->add('Classe')
            ->add('Categorie')
            ->add('Utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
