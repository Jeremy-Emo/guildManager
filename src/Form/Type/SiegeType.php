<?php

namespace App\Form\Type;

use App\Entity\EnemyGuild;
use App\Entity\Rank;
use App\Entity\Siege;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiegeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'data' => new \DateTime('now')
            ])
            ->add('rank', EntityType::class, [
                'class' => Rank::class,
                'choice_label' => function ($rank) {
                    return $rank->getName();
                },
                'choice_attr' => function($choice, $key, $value) {
                    return [
                        'data-content' => $choice->getName() . " <img src='" . $choice->getImage(). "'>"
                    ];
                },
                'attr' => [
                    'class' => 'selectpicker'
                ]
            ])
            ->add('enemyGuildOne', EntityType::class, [
                'class' => EnemyGuild::class,
                'choice_label' => function ($guild) {
                    return $guild->getName();
                },
                'attr' => [
                    'class' => 'selectpicker'
                ]
            ])
            ->add('enemyGuildTwo', EntityType::class, [
                'class' => EnemyGuild::class,
                'choice_label' => function ($guild) {
                    return $guild->getName();
                },
                'attr' => [
                    'class' => 'selectpicker'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Siege::class,
        ]);
    }
}