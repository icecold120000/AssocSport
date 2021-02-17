<?php

namespace App\Form;

use App\Entity\Budget;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BudgetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelleBudget', TextType::class,[
                'label' => 'Le libellé du budget',
                'required' => false,
            ])
            ->add('montantInitialBudget', TextType::class,[
                'label' => 'Le montant initial du budget',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Budget::class,
        ]);
    }
}
