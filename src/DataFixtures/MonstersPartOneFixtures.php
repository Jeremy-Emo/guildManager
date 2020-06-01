<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\Id\AssignedGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;

class MonstersPartOneFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load($manager)
    {
        $oneStars = [
            [
                'name' => 'Havana',
                'img' => 'havana',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_DARK"),
                'id' => 12805,
            ],
            [
                'name' => 'Lamor',
                'img' => 'lamor',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_FIRE"),
                'id' => 12802,
            ],
            [
                'name' => 'Samour',
                'img' => 'samour',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_WIND"),
                'id' => 12803,
            ],
            [
                'name' => 'Tigryss',
                'img' => 'tigryss',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_WATER"),
                'id' => 12801,
            ],
            [
                'name' => 'Varis',
                'img' => 'varis',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_LIGHT"),
                'id' => 12804,
            ],
        ];

        foreach ($oneStars as $oneStar) {
            $mon = new Monster();
            $mon->setName($oneStar['name'])->setImage('/img/1nat/' . $oneStar['img'] . '.png')->setNaturalStars(1);
            if(isset($oneStar['family'])){
                $mon->setMonsterFamily($oneStar['family']);
            }
            if(isset($oneStar['element'])){
                $mon->setElement($oneStar['element']);
            }
            $mon->setId($oneStar['id']);
            $manager->persist($mon);

            $metadata = $manager->getClassMetaData(get_class($mon));
            $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
            $metadata->setIdGenerator(new AssignedGenerator());
        }

        $manager->flush();

    }

    public static function getGroups(): array
    {
        return ['toProd', 'monsters'];
    }

    public function getDependencies()
    {
        return array(
            FamilyFixtures::class,
            ElementsFixtures::class
        );
    }
}
