<?php

namespace App\Form\Type;

use App\Entity\Members;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuildContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isInGvG', CheckboxType::class, [
                'row_attr' => [
                    'class' => 'pretty p-default',
                ],
                'label' => 'Inscription en GvG',
                'required' => false,
            ])
            ->add('isInGvO', CheckboxType::class, [
                'row_attr' => [
                    'class' => 'pretty p-default',
                ],
                'label' => 'Inscription en GvO',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Members::class,
        ]);
    }
}