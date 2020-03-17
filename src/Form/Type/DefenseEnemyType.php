<?php

namespace App\Form\Type;

use App\Entity\Defense;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DefenseEnemyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mobLeader')
            ->add('mobOne')
            ->add('mobTwo')
            ->add('detail')
            ->add('enemyName')
            ->add('victories', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                ]
            ])
            ->add('loses', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Defense::class,
        ]);
    }
}