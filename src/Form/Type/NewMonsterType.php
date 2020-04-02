<?php

namespace App\Form\Type;

use App\Entity\Monster;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class NewMonsterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('monsterFamily')
            ->add('element')
            ->add('naturalStars')
            ->add('file', FileType::class, [
                'constraints' => [
                    new File([
                        'maxSize' => '3072k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png'
                        ],
                        'mimeTypesMessage' => 'Merci de téléverser une image correspondant aux critères.',
                    ])
                ],
                'required' => true,
                'label' => 'Image',
                'attr' => [
                    'class' => 'dropify',
                    'data-max-file-size' => '3M',
                    'data-allowed-file-extensions' => 'jpg jpeg png'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Monster::class,
        ]);
    }
}