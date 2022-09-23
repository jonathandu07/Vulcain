<?php

namespace App\Form;

use App\Entity\Repports;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepportsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rapport')
            ->add('createdAt')
            ->add('IdUser')
            ->add('IdService')
            ->add('IdProduit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Repports::class,
        ]);
    }
}
