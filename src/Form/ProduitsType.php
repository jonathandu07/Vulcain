<?php

namespace App\Form;

use App\Entity\Produits;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomProduit', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom produit',
                ],
                'required' => true,
            ])
            ->add('description', TextareaType::class,[
                'label' => false,
                'attr' =>[
                'placeholder' => 'Description',],
            ])
            ->add('prix', MoneyType::class,[
                'label' =>  'Prix',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Prix du produit',
                ],
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
            'data_class' => Produits::class,
        ]);
    }
}
