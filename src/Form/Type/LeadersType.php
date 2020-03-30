<?php

namespace App\Form\Type;

use App\Entity\Members;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LeadersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('members', EntityType::class, [
            'required' => false,
            'multiple' => true,
            'expanded' => true,
            'class' => Members::class,
            'query_builder' => function (EntityRepository $er) use ($options) {
                return $er->createQueryBuilder('m')
                    ->join('m.guild', 'g')
                    ->join('m.user', 'u')
                    ->where('g.id = '.$options['id'])
                    ->orderBy('u.username', 'ASC');
            },
            'mapped' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
            'id' => null,
        ]);
    }
}