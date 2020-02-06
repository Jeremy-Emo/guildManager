<?php

namespace App\Form\Type;

use App\Entity\Buildings;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BuildingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('atk', IntegerType::class, [
                'attr' => [
                    'max' => 10
                ]
            ])
            ->add('def', IntegerType::class, [
                'attr' => [
                    'max' => 10
                ]
            ])
            ->add('spd', IntegerType::class, [
                'attr' => [
                    'max' => 10
                ]
            ])
            ->add('pv', IntegerType::class, [
                'attr' => [
                    'max' => 10
                ]
            ])
            ->add('dcc', IntegerType::class, [
                'attr' => [
                    'max' => 10
                ]
            ])
            ->add('wind', IntegerType::class, [
                'attr' => [
                    'max' => 10
                ]
            ])
            ->add('water', IntegerType::class, [
                'attr' => [
                    'max' => 10
                ]
            ])
            ->add('fire', IntegerType::class, [
                'attr' => [
                    'max' => 10
                ]
            ])
            ->add('light', IntegerType::class, [
                'attr' => [
                    'max' => 10
                ]
            ])
            ->add('dark', IntegerType::class, [
                'attr' => [
                    'max' => 10
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Buildings::class,
        ]);
    }
}