<?php

namespace App\Form\Type;

use App\Entity\Siege;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiegeInfosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('place', ChoiceType::class, [
                'choices' => [
                    'En cours' => 0,
                    'Premier' => 1,
                    'Deuxième' => 2,
                    'Troisième' => 3,
                ],
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