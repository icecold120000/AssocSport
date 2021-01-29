<?php

namespace App\Form;

use App\Entity\Document;
use App\Entity\Evenement;
use App\Entity\CategorieDocument;
use App\Repository\EvenementRepository;
use App\Repository\CategorieDocumentRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $document = new Document();
        $builder
            ->add('nomDocument', TextType::class,[
                'label' => 'Le nom du document',
                'required' => false,
            ])
            ->add('lienDocument', FileType::class, [
                'label' => 'Le fichier du document',
                'data_class' => null,
                'required' => false,
            ])
            ->add('descriptionDocument', TextType::class,[
                'label' => 'La description du document',
                'required' => false,
            ])
            ->add('Evenement', EntityType::class,[
                'label' => 'L\'événement auquel il appartient',
                'class' => Evenement::class,
                'placeholder' => 'Choisir un événement',
                'query_builder' => function (EvenementRepository $er) {
                    return $er->createQueryBuilder('e')
                        ->orderBy('e.nomEvenement', 'ASC');
                },
                'choice_label' => 'nomEvenement',
                'required' => false,
            ])
            ->add('categorieDocument', EntityType::class,[
                'label' => 'La catégorie auquel il appartient',
                'class' => CategorieDocument::class,
                'placeholder' => 'Choisir une categorie',
                'query_builder' => function (CategorieDocumentRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.libelleCategorieDoc', 'ASC');
                },
                'choice_label' => 'libelleCategorieDoc',
                'required' => false,
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