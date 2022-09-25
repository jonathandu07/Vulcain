<?php

namespace App\Form;

use App\Entity\GeographiqueZone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class GeographiqueZoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pays', TextType::class, [
                'label' => 'Pays',
                'attr' => [
                    'placeholder' => 'écrire pays',
                ],
                'required' => true,
            ])
            ->add('region', TextType::class, [
                'label' => 'Région',
                'attr' => [
                    'placeholder' => 'écrire région',
                ],
                'required' => true,
            ])
            ->add('departement', NumberType::class, [
                'label' => 'numéro de département',
                'attr' => [
                    'placeholder' => 'n°...',
                ],
                'required' => true,
            ])
            ->add('codePostal', NumberType::class, [
                'label' => 'code postal',
                'attr' => [
                    'placeholder' => 'écrire...',
                ],
                'required' => true,
            ])
            ->add('localite', TestType::class, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'ville...',
                ],
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GeographiqueZone::class,
        ]);
    }
}
