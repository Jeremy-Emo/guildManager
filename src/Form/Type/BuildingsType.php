<?php

namespace App\Form\Type;

use App\Entity\Buildings;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BuildingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('atk')
            ->add('def')
            ->add('spd')
            ->add('pv')
            ->add('dcc')
            ->add('wind')
            ->add('water')
            ->add('fire')
            ->add('light')
            ->add('dark')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Buildings::class,
        ]);
    }
}