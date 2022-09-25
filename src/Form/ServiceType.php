<?php

namespace App\Form;

use App\Entity\Services;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomService', TestType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Nom produit',
            ],
            'required' => true,
        ])
            ->add('description', TextareaType::class, [
            'label' => false, [
                'placeholder' => 'Description',
            ],
            'required' => true,
        ])
            ->add('tarif', FloatType::class, [
            'label' =>  'Prix',
            'required' => true,
        ])
            ->add('type', TestType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Type de produit',
            ],
            'required' => true,
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Services::class,
        ]);
    }
}
