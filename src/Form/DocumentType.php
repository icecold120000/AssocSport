<?php

namespace App\Form;

use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomDocument', TextType::class,[
                'label' => 'Nom du document',
                'help' => 'Saisissez un nom de document',
                'required' => true,
            ])
            ->add('lienDocument', FileType::class, [
                'label' => 'le fichier du document',
                'required' => true,
            ])
            ->add('descriptionDocument', TextType::class,[
                'label' => 'Nom du document',
                'help' => 'Saisissez un nom de document',
                'required' => true,
            ])
            ->add('dateAjout', DateType::class,[
                'label' => 'date d\'ajout du document',
                'required' => true,
            ])
            ->add('Evenement', EntityType::class,[
                'class' => Document::class,
                'choices' => $group->getEvenement(),
                'required' => true,
            ])
            ->add('categorieDocument', EntityType::class,[
                'label' => 'Evenement qu\'il appartient',
                'class' => Document::class,
                'choices' => $group->getCategorieDocument(),
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
