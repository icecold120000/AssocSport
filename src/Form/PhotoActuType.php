<?php

namespace App\Form;

use App\Entity\PhotoActu;
use App\Entity\Actualite;
use App\Repository\ActualiteRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PhotoActuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fileNames', FileType::class, [
                'label' => 'L\'image d\'actualité',
                'mapped' => false,
                'required' => false,
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
            ->add('actualite', EntityType::class,[
                'label' => 'L\'actualité auquel la ou les photo(s) sont attachées',
                'class' => Actualite::class,
                'query_builder' => function (ActualiteRepository $er) {
                    return $er->createQueryBuilder('act')
                        ->orderBy('act.id', 'ASC');
                },
                'choice_label' => 'nomActu',
                'required' => false,
            ])
            ->add('archivePhoto', ChoiceType::class, [
                'label' => 'Si la photo est archivé ou non',
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
            'data_class' => PhotoActu::class,
        ]);
    }
}
