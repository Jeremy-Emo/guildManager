<?php

namespace App\Form\Type;

use App\Entity\Achievement;
use App\Entity\AchievementsCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class HfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if($options['edit'] === null){
            $builder
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
        $builder
            ->add('name')
            ->add('text')
            ->add('achievementsCategories', EntityType::class, array(
                'class' => AchievementsCategory::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Achievement::class,
            'edit' => null,
        ]);
    }
}