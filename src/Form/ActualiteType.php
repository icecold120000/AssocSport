<?php

namespace App\Form;

use App\Entity\Actualite;
use App\Entity\PhotoActu;
use App\Repository\PhotoActuRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;


class ActualiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomActu', TextType::class,[
                'label' => 'Le nom de l\'actualité',
                'required' => false,
            ])
            ->add('descripActu', TextareaType::class,[
                'label' => 'La description de l\'actualité',
                'required' => false,
            ])
            ->add('fileNameVig', FileType::class, [
                'label' => 'La vignette de l\'actualité',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Veuillez selectionner un fichier png/jpeg/jpg',
                        'maxSizeMessage' => 'Veuillez transferer un fichier ayant pour taille maximum de {{limit}}',
                    ])
                ]
            ])
            ->add('photoActu', FileType::class, [
                'label' => '(Les)L\'image(s) d\'actualité',
                'mapped' => false,
                'required' => false,
                'multiple' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '4096k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Veuillez selectionner un fichier png/jpeg/jpg',
                        'maxSizeMessage' => 'Veuillez transferer un fichier ayant pour taille maximum de {{limit}}',
                    ])
                ],
            ])
            ->add('archiveActu', ChoiceType::class, [
                'label' => 'L\'Archivage de l\'actualité',
                'choices' => [
                    'Non Archivé' => 0,
                    'Archivé' => 1,
                ],
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actualite::class,
        ]);
    }
}
