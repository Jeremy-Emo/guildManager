<?php

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MonstersPartOneFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load($manager)
    {
        $oneStars = [
            [
                'name' => 'Havana',
                'img' => 'havana',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_DARK")
            ],
            [
                'name' => 'Lamor',
                'img' => 'lamor',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_FIRE")
            ],
            [
                'name' => 'Samour',
                'img' => 'samour',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_WIND")
            ],
            [
                'name' => 'Tigryss',
                'img' => 'tigryss',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_WATER")
            ],
            [
                'name' => 'Varis',
                'img' => 'varis',
                'family' => $this->getReference("elementaireFaible"),
                'element' => $this->getReference("ELEM_LIGHT")
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
            $manager->persist($mon);
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
