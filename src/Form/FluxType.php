<?php

namespace App\Form;

use App\Entity\Flux;
use App\Entity\Budget;
use App\Entity\Evenement;
use App\Entity\TypeFlux;
use App\Repository\BudgetRepository;
use App\Repository\EvenementRepository;
use App\Repository\TypeFluxRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FluxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montantFlux', TextType::class,[
                'label' => 'Le montant du flux',
                'required' => false,
            ])
            ->add('libelleFlux', TextType::class,[
                'label' => 'Le libellé du flux',
                'required' => false,
            ])
            ->add('facturationFlux', ChoiceType::class, [
                'label' => 'La facturation du flux',
                'choices' => [
                    'Non facturé' => '0',
                    'Facturé' => '1',
                ],
                'required' => false,
            ])
            ->add('typeFlux', EntityType::class,[
                'label' => 'Le type de flux concerné',
                'class' => TypeFlux::class,
                'query_builder' => function (TypeFluxRepository $er) {
                    return $er->createQueryBuilder('tf')
                        ->orderBy('tf.id');
                },
                'choice_label' => 'libelleTypeFlux',
                'choice_value' => function (?TypeFlux $type) {
                    return $type ? $type->getId() : '';
                },
                'required' => false,
            ])
            ->add('evenement', EntityType::class,[
                'label' => 'l\'événement qui est concerné',
                'class' => Evenement::class,
                'query_builder' => function (EvenementRepository $er) {
                    return $er->createQueryBuilder('ev')
                        ->orderBy('ev.id');
                },
                'choice_label' => 'nomEvenement',
                'choice_value' => function (?Evenement $event) {
                    return $event ? $event->getId() : '';
                },
                'required' => false,
            ])
            ->add('budget', EntityType::class,[
                'label' => 'le budget qui est concerné',
                'class' => Budget::class,
                'query_builder' => function (BudgetRepository $er) {
                    return $er->createQueryBuilder('cl')
                        ->orderBy('cl.id');
                },
                'choice_label' => 'libelleBudget',
                'choice_value' => function (?Budget $budget) {
                    return $budget ? $budget->getId() : '';
                },
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Flux::class,
        ]);
    }
}
