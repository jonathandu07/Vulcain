<?php

namespace App\Form;

use App\Entity\Produits;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomProduit', TestType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom produit',
                ],
                'required' => true,
            ])
            ->add('description', TextareaType::class,[
                'label' => false,[
                'placeholder' => 'Description',],
                'required' => true,
            ])
            ->add('prix', FloatType::class,[
                'label' =>  'Prix',
                'required' => true,
            ])
            ->add('type', TestType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Type de produit',
                ],
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produits::class,
        ]);
    }
}
