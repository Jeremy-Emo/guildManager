<?php

namespace App\Form\Type;

use App\Entity\Guild;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuildInfosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', TextareaType::class, [
                'required' => false,
            ])
            ->add('discordLink', TextType::class, [
                'required' => false,
            ])
            ->add('websiteLink', TextType::class, [
                'required' => false,
            ])
            ->add('horaires', TextType::class, [
                'required' => false,
            ])
            ->add('level', IntegerType::class, [
                'required' => false,
                'attr' => [
                    'min' => 0,
                ],
            ])
            ->add('gvgDefType', TextType::class, [
                'required' => false,
            ])
            ->add('plusRule', IntegerType::class, [
                'required' => false,
                'attr' => [
                    'min' => 0,
                ],
            ])
            ->add('gvgWarning', IntegerType::class, [
                'required' => false,
                'attr' => [
                    'min' => 0,
                ],
            ])
            ->add('gvgCritical', IntegerType::class, [
                'required' => false,
                'attr' => [
                    'min' => 0,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Guild::class,
        ]);
    }
}