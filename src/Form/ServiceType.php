<?php

namespace App\Form;

use App\Entity\Services;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomService', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom produit',
                ],
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'label' => false,
                    'attr' => [
                        'placeholder' => 'Description',
                    ],
                'required' => true,
            ])
            ->add('tarif', NumberType::class, [
                'label' =>  false,
                'required' => true,
            ])
            ->add('type', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Type de produit',
                ],
                'required' => true,
            ])
            ->add('imageFile', VichImageType::class, [
                'required'=> true,
                'download_uri' => false,
                'asset_helper' => true,
                'image_uri' => true,
                'label' => false,
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
