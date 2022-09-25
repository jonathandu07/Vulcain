<?php

namespace App\Form;

use App\Entity\Comments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('active', CheckboxType::class, [
            'label' => 'Valier commentaire',
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez valider votre commentaire.'
                ])
            ],
            'required' => true,
        ])
            ->add('note', RangeType::class, [
            'label' => 'Note :',
            'attr' => [
                'min' => 0,
                'max' => 5,
                'value' => 3
            ],
            'help' => 'Déplacer le curseur pour attribuer une note entre 0 et 5.',
            'required' => true,
        ])
            ->add('commentaire', TextareaType::class, [
            'label' => 'Commentaire :',
            'attr' => [
                'placeholder' => 'écrire'
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comments::class,
        ]);
    }
}
