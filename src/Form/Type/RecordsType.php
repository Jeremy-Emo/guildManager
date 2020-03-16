<?php

namespace App\Form\Type;

use App\Entity\Scores;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecordsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gb10')
            ->add('db10')
            ->add('nb10')
            ->add('toa', IntegerType::class, [
                'attr' => [
                    'max' => 100
                ]
            ])
            ->add('toah', IntegerType::class, [
                'attr' => [
                    'max' => 100
                ]
            ])
            ->add('r4', CheckboxType::class, [
                'row_attr' => [
                    'class' => 'pretty p-default d-block',
                ],
                'label' => 'R4',
                'required' => false,
            ])
            ->add('r5', CheckboxType::class, [
                'row_attr' => [
                    'class' => 'pretty p-default d-block',
                ],
                'label' => 'R5',
                'required' => false,
            ])
            ->add('sssFireRift', CheckboxType::class, [
                'row_attr' => [
                    'class' => 'pretty p-default d-block',
                ],
                'label' => 'SSS Rift Feu',
                'required' => false,
            ])
            ->add('sssWindRift', CheckboxType::class, [
                'row_attr' => [
                    'class' => 'pretty p-default d-block',
                ],
                'label' => 'SSS Rift Vent',
                'required' => false,
            ])
            ->add('sssWaterRift', CheckboxType::class, [
                'row_attr' => [
                    'class' => 'pretty p-default d-block',
                ],
                'label' => 'SSS Rift Eau',
                'required' => false,
            ])
            ->add('sssDarkRift', CheckboxType::class, [
                'row_attr' => [
                    'class' => 'pretty p-default d-block',
                ],
                'label' => 'SSS Rift Dark',
                'required' => false,
            ])
            ->add('sssLightRift', CheckboxType::class, [
                'row_attr' => [
                    'class' => 'pretty p-default d-block',
                ],
                'label' => 'SSS Rift Light',
                'required' => false,
            ])
            ->add('bestRTARank')
            ->add('bestArenaRank')
            ->add('nbSixStars')
            ->add('minSpeed')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scores::class,
        ]);
    }
}