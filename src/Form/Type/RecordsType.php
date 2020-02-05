<?php

namespace App\Form\Type;

use App\Entity\Scores;
use Symfony\Component\Form\AbstractType;
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
            ->add('toa')
            ->add('toah')
            ->add('r4')
            ->add('r5')
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